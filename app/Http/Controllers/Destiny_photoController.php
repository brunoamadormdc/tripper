<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDestiny_photoRequest;
use App\Http\Requests\UpdateDestiny_photoRequest;
use App\Repositories\Destiny_photoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

//Storage
use Illuminate\Support\Facades\Storage;

class Destiny_photoController extends AppBaseController
{
    /** @var  Destiny_photoRepository */
    private $destinyPhotoRepository;

    public function __construct(Destiny_photoRepository $destinyPhotoRepo)
    {
        $this->destinyPhotoRepository = $destinyPhotoRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Destiny_photo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $destinyPhotos = $this->destinyPhotoRepository->paginate(10);

        return view('destiny_photos.index')
            ->with('destinyPhotos', $destinyPhotos);
    }

    /**
     * Show the form for creating a new Destiny_photo.
     *
     * @return Response
     */
    public function create()
    {
        return view('destiny_photos.create');
    }

    /**
     * Store a newly created Destiny_photo in storage.
     *
     * @param CreateDestiny_photoRequest $request
     *
     * @return Response
     */
    public function store(CreateDestiny_photoRequest $request)
    {
        $input = $request->all();

        $destinyPhoto = $this->destinyPhotoRepository->create($input);

        if($request->file('image')){
            $path = Storage::disk('public')->put('destiny-images', $request->file('image'));
            $destinyPhoto->fill(['image' => asset($path)])->save();
        }


        Flash::success('Foto salva com sucesso.');

        return redirect(route('destinyPhotos.index'));
    }

    /**
     * Display the specified Destiny_photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $destinyPhoto = $this->destinyPhotoRepository->find($id);

        if (empty($destinyPhoto)) {
            Flash::error('Foto não encontrada');

            return redirect(route('destinyPhotos.index'));
        }

        return view('destiny_photos.show')->with('destinyPhoto', $destinyPhoto);
    }

    /**
     * Show the form for editing the specified Destiny_photo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $destinyPhoto = $this->destinyPhotoRepository->find($id);

        if (empty($destinyPhoto)) {
            Flash::error('Foto não encontrada');

            return redirect(route('destinyPhotos.index'));
        }

        return view('destiny_photos.edit')->with('destinyPhoto', $destinyPhoto);
    }

    /**
     * Update the specified Destiny_photo in storage.
     *
     * @param int $id
     * @param UpdateDestiny_photoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestiny_photoRequest $request)
    {
        $destinyPhoto = $this->destinyPhotoRepository->find($id);

        if (empty($destinyPhoto)) {
            Flash::error('Foto não encontrada');

            return redirect(route('destinyPhotos.index'));
        }

        $destinyPhoto = $this->destinyPhotoRepository->update($request->all(), $id);

        Flash::success('Foto alterada com sucesso.');

        return redirect(route('destinyPhotos.index'));
    }

    /**
     * Remove the specified Destiny_photo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $destinyPhoto = $this->destinyPhotoRepository->find($id);

        if (empty($destinyPhoto)) {
            Flash::error('Foto não encontrada');

            return redirect(route('destinyPhotos.index'));
        }

        $this->destinyPhotoRepository->delete($id);

        Flash::success('Foto excluída com sucesso.');

        return redirect(route('destinyPhotos.index'));
    }
}
