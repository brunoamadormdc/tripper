<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFirst_home_bannerRequest;
use App\Http\Requests\UpdateFirst_home_bannerRequest;
use App\Repositories\First_home_bannerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\First_home_banner;
//Storage
use Illuminate\Support\Facades\Storage;

class First_home_bannerController extends AppBaseController
{
    /** @var  First_home_bannerRepository */
    private $firstHomeBannerRepository;

    public function __construct(First_home_bannerRepository $firstHomeBannerRepo)
    {
        $this->firstHomeBannerRepository = $firstHomeBannerRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the First_home_banner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        if(isset($request->tag)){
            $firstHomeBanners = First_home_banner::withAnyTag([$request->tag])->paginate(10);
        }else{
            $firstHomeBanners = $this->firstHomeBannerRepository->paginate(10);
        }

        return view('first_home_banners.index')
            ->with('firstHomeBanners', $firstHomeBanners);
    }

    /**
     * Show the form for creating a new First_home_banner.
     *
     * @return Response
     */
    public function create()
    {
        return view('first_home_banners.create');
    }

    /**
     * Store a newly created First_home_banner in storage.
     *
     * @param CreateFirst_home_bannerRequest $request
     *
     * @return Response
     */
    public function store(CreateFirst_home_bannerRequest $request)
    {
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        $firstHomeBanner = $this->firstHomeBannerRepository->create($input);

        if($request->file('image')){
            $path = Storage::disk('public')->put('first-home-banner-images', $request->file('image'));
            $firstHomeBanner->fill(['image' => asset($path)])->save();
        }

        $firstHomeBanner->tag($tags);

        Flash::success('Banner salvo com sucesso.');

        return redirect(route('firstHomeBanners.index'));
    }

    /**
     * Display the specified First_home_banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firstHomeBanner = $this->firstHomeBannerRepository->find($id);

        if (empty($firstHomeBanner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('firstHomeBanners.index'));
        }

        return view('first_home_banners.show')->with('firstHomeBanner', $firstHomeBanner);
    }

    /**
     * Show the form for editing the specified First_home_banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firstHomeBanner = $this->firstHomeBannerRepository->find($id);
        $tags = '';
        if(!empty($firstHomeBanner->tags)){            
            foreach($firstHomeBanner->tags as $tag){
                $tags .= $tag->name . ",";
            }
        }

        if (empty($firstHomeBanner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('firstHomeBanners.index'));
        }

        return view('first_home_banners.edit')->with(['firstHomeBanner' => $firstHomeBanner, 'tags' => $tags]);
    }

    /**
     * Update the specified First_home_banner in storage.
     *
     * @param int $id
     * @param UpdateFirst_home_bannerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFirst_home_bannerRequest $request)
    {
        $firstHomeBanner = $this->firstHomeBannerRepository->find($id);
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        if (empty($firstHomeBanner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('firstHomeBanners.index'));
        }

        if($request->file('image')){
            if($firstHomeBanner->image){
                $url = explode('/', $firstHomeBanner->image);
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }
        }

        $firstHomeBanner = $this->firstHomeBannerRepository->update($request->all(), $id);

        if($request->file('image')){            
            $path = Storage::disk('public')->put('first-home-banner-images', $request->file('image'));
            $firstHomeBanner->fill(['image' => asset($path)])->save();
        }

        $firstHomeBanner->retag($tags);

        Flash::success('Banner alterado com sucesso.');

        return redirect(route('firstHomeBanners.index'));
    }

    /**
     * Remove the specified First_home_banner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firstHomeBanner = $this->firstHomeBannerRepository->find($id);

        if (empty($firstHomeBanner)) {
            Flash::error('Banner não encontrado');

            return redirect(route('firstHomeBanners.index'));
        }

         //Remove tip tagged tags
         $firstHomeBanner->untag();

        $this->firstHomeBannerRepository->delete($id);

        Flash::success('Banner excluído com sucesso.');

        return redirect(route('firstHomeBanners.index'));
    }
}
