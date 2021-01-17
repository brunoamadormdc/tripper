<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost_PhotoRequest;
use App\Http\Requests\UpdatePost_PhotoRequest;
use App\Repositories\Post_PhotoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
//Storage
use Illuminate\Support\Facades\Storage;

class Post_PhotoController extends AppBaseController
{
    /** @var  Post_PhotoRepository */
    private $postPhotoRepository;

    public function __construct(Post_PhotoRepository $postPhotoRepo)
    {
        $this->postPhotoRepository = $postPhotoRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Post_Photo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $postPhotos = $this->postPhotoRepository->paginate(10);

        return view('post__photos.index')
            ->with('postPhotos', $postPhotos);
    }

    /**
     * Show the form for creating a new Post_Photo.
     *
     * @return Response
     */
    public function create()
    {
        return view('post__photos.create');
    }

    /**
     * Store a newly created Post_Photo in storage.
     *
     * @param CreatePost_PhotoRequest $request
     *
     * @return Response
     */
    public function store(CreatePost_PhotoRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = \Auth::user()->id;

        $postPhoto = $this->postPhotoRepository->create($input);

        if($request->file('image')){
            $path = Storage::disk('public')->put('post-images', $request->file('image'));
            $postPhoto->fill(['image' => asset($path)])->save();
        }

        Flash::success('Foto do post adcionada com sucesso.');

        //return redirect(route('postPhotos.index'));
        return redirect(route('posts.show', $input['post_id']));
    }

    /**
     * Display the specified Post_Photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postPhoto = $this->postPhotoRepository->find($id);

        if (empty($postPhoto)) {
            Flash::error('Foto nao encontrada');

            return redirect(route('postPhotos.index'));
        }

        return view('post__photos.show')->with('postPhoto', $postPhoto);
    }

    /**
     * Show the form for editing the specified Post_Photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postPhoto = $this->postPhotoRepository->find($id);

        if (empty($postPhoto)) {
            Flash::error('Foto nao encontrada');

            return redirect(route('postPhotos.index'));
        }

        return view('post__photos.edit')->with('postPhoto', $postPhoto);
    }

    /**
     * Update the specified Post_Photo in storage.
     *
     * @param int $id
     * @param UpdatePost_PhotoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePost_PhotoRequest $request)
    {
        $postPhoto = $this->postPhotoRepository->find($id);

        if (empty($postPhoto)) {
            Flash::error('Foto nao encontrada');

            return redirect(route('postPhotos.index'));
        }

        $postPhoto = $this->postPhotoRepository->update($request->all(), $id);

        Flash::success('Post  Photo updated successfully.');

        return redirect(route('postPhotos.index'));
    }

    /**
     * Remove the specified Post_Photo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postPhoto = $this->postPhotoRepository->find($id);

        if (empty($postPhoto)) {
            Flash::error('Foto nao encontrada');

            return redirect(route('postPhotos.index'));
        }

        $this->postPhotoRepository->delete($id);

        Flash::success('Post  Photo deleted successfully.');

        return redirect(route('postPhotos.index'));
    }
}
