<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDestinyRequest;
use App\Http\Requests\UpdateDestinyRequest;
use App\Repositories\DestinyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Destiny;
//Storage
use Illuminate\Support\Facades\Storage;



class DestinyController extends AppBaseController
{
    /** @var  DestinyRepository */
    private $destinyRepository;

    public function __construct(DestinyRepository $destinyRepo)
    {
        $this->destinyRepository = $destinyRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Destiny.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {        

        if(isset($request->tag)){
            $destinies = Destiny::withAnyTag([$request->tag])->paginate(10);
        }else{
            $destinies = $this->destinyRepository->paginate(10);
        }

        return view('destinies.index')
            ->with('destinies', $destinies);
    }

    /**
     * Show the form for creating a new Destiny.
     *
     * @return Response
     */
    public function create()
    {
        return view('destinies.create');
    }

    /**
     * Store a newly created Destiny in storage.
     *
     * @param CreateDestinyRequest $request
     *
     * @return Response
     */
    public function store(CreateDestinyRequest $request)
    {
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        $destiny = $this->destinyRepository->create($input);

        if($request->file('main_image')){
            $path = Storage::disk('public')->put('destiny-images', $request->file('main_image'));
            $destiny->fill(['main_image' => asset($path)])->save();
        }

        if($request->file('secondary_image')){
            $path = Storage::disk('public')->put('destiny-images', $request->file('secondary_image'));
            $destiny->fill(['secondary_image' => asset($path)])->save();
        }

        $destiny->tag($tags);

        Flash::success('Destino salvo com sucesso.');

        return redirect(route('destinies.index'));
    }

    /**
     * Display the specified Destiny.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $destiny = $this->destinyRepository->find($id);

        if (empty($destiny)) {
            Flash::error('Destino não encontrado');

            return redirect(route('destinies.index'));
        }

        return view('destinies.show')->with('destiny', $destiny);
    }

    /**
     * Show the form for editing the specified Destiny.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $destiny = $this->destinyRepository->find($id);
        $tags = '';
        if(!empty($destiny->tags)){            
            foreach($destiny->tags as $tag){
                $tags .= $tag->name . ",";
            }
        }

        if (empty($destiny)) {
            Flash::error('Destino não encontrado');

            return redirect(route('destinies.index'));
        }

        return view('destinies.edit')->with(['destiny' => $destiny, 'tags' => $tags]);
    }

    /**
     * Update the specified Destiny in storage.
     *
     * @param int $id
     * @param UpdateDestinyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestinyRequest $request)
    {
        $destiny = $this->destinyRepository->find($id);
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        if(!isset($input['published'])){
          $input['published'] = false;  
        }

        if (empty($destiny)) {
            Flash::error('Destino não encontrado');

            return redirect(route('destinies.index'));
        }

        if($request->file('main_image')){
            if($destiny->main_image){
                $url = explode('/', $destiny->main_image);                
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }           
        }

        if($request->file('secondary_image')){
            if($destiny->secondary_image){
                $url = explode('/', $destiny->secondary_image);
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }
        }

        $destiny = $this->destinyRepository->update($input, $id);

        if($request->file('main_image')){
            $path = Storage::disk('public')->put('destiny-images', $request->file('main_image'));
            $destiny->fill(['main_image' => asset($path)])->save();
        }
        

        if($request->file('secondary_image')){            
            $path = Storage::disk('public')->put('destiny-images', $request->file('secondary_image'));
            $destiny->fill(['secondary_image' => asset($path)])->save();
        }

        $destiny->retag($tags);

        Flash::success('Destino alterado com sucesso.');

        return redirect(route('destinies.index'));
    }

    /**
     * Remove the specified Destiny from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $destiny = $this->destinyRepository->find($id);

        if (empty($destiny)) {
            Flash::error('Destino não encontrado');

            return redirect(route('destinies.index'));
        }

        //Remove main_image from disk
        /* if($destiny->main_image){
            $url = explode('/', $destiny->main_image);
            $delete_file = $url['3'].'/'.$url['4'];                          
            Storage::disk('public')->delete($delete_file);
        } */

        //Remove secondary_image from disk
        /* if($destiny->secondary_image){
            $url = explode('/', $destiny->secondary_image);
            $delete_file = $url['3'].'/'.$url['4'];                          
            Storage::disk('public')->delete($delete_file);
        } */

        //Remove destiny uploaded photos
        foreach($destiny->photos as $photo){
            /* $url = explode('/', $photo->image);
            $delete_file = $url['3'].'/'.$url['4'];                          
            Storage::disk('public')->delete($delete_file); */
            $photo->delete();
        }

        //Remove destiny tagged tags
        $destiny->untag();

        $this->destinyRepository->delete($id);

        Flash::success('Destino excluído com sucesso.');

        return redirect(route('destinies.index'));
    }
}
