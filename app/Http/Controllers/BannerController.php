<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Repositories\BannerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Banner;
//Storage
use Illuminate\Support\Facades\Storage;

class BannerController extends AppBaseController
{
    /** @var  BannerRepository */
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepository = $bannerRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Banner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {       

        if(isset($request->tag)){
            $banners = Banner::withAnyTag([$request->tag])->paginate(10);
        }else{
            $banners = $this->bannerRepository->paginate(10);
        }

        return view('banners.index')
            ->with('banners', $banners);
    }

    /**
     * Show the form for creating a new Banner.
     *
     * @return Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created Banner in storage.
     *
     * @param CreateBannerRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerRequest $request)
    {
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        $banner = $this->bannerRepository->create($input);

        if($request->file('image')){
            $path = Storage::disk('public')->put('banner-images', $request->file('image'));
            $banner->fill(['image' => asset($path)])->save();
        }

        $banner->tag($tags);

        Flash::success('Banner salvo com sucesso');

        return redirect(route('banners.index'));
    }

    /**
     * Display the specified Banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('banners.index'));
        }

        return view('banners.show')->with('banner', $banner);
    }

    /**
     * Show the form for editing the specified Banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $banner = $this->bannerRepository->find($id);
        $tags = '';
        if(!empty($banner->tags)){            
            foreach($banner->tags as $tag){
                $tags .= $tag->name . ",";
            }
        }

        if (empty($banner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('banners.index'));
        }

        return view('banners.edit')->with(['banner' => $banner, 'tags' => $tags]);
    }

    /**
     * Update the specified Banner in storage.
     *
     * @param int $id
     * @param UpdateBannerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerRequest $request)
    {
        $banner = $this->bannerRepository->find($id);
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        if (empty($banner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('banners.index'));
        }

        if($request->file('image')){
            if($banner->image){
                $url = explode('/', $banner->image);
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }
        }

        $banner = $this->bannerRepository->update($request->all(), $id);

        if($request->file('image')){            
            $path = Storage::disk('public')->put('banner-images', $request->file('image'));
            $banner->fill(['image' => asset($path)])->save();
        }

        $banner->retag($tags);

        Flash::success('Banner alterado com sucesso.');

        return redirect(route('banners.index'));
    }

    /**
     * Remove the specified Banner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('banners.index'));
        }

        //Remove tip tagged tags
        $banner->untag();

        $this->bannerRepository->delete($id);

        Flash::success('Banner excluído com sucesso.');

        return redirect(route('banners.index'));
    }
}
