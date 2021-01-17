<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Repositories\PackageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

//Storage
use Illuminate\Support\Facades\Storage;

use App\Models\Package;

class PackageController extends AppBaseController
{
    /** @var  PackageRepository */
    private $packageRepository;

    public function __construct(PackageRepository $packageRepo)
    {
        $this->packageRepository = $packageRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Package.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {       

        if(isset($request->tag)){
            $packages = Package::withAnyTag([$request->tag])->paginate(10);
        }else{
            $packages = $this->packageRepository->paginate(10);
        }

        return view('packages.index')
            ->with('packages', $packages);
    }

    /**
     * Show the form for creating a new Package.
     *
     * @return Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created Package in storage.
     *
     * @param CreatePackageRequest $request
     *
     * @return Response
     */
    public function store(CreatePackageRequest $request)
    {
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        $package = $this->packageRepository->create($input);

        if($request->file('main_image')){
            $path = Storage::disk('public')->put('package-images', $request->file('main_image'));
            $package->fill(['main_image' => asset($path)])->save();
        }

        $package->tag($tags);

        Flash::success('Pacote criado com sucesso.');

        return redirect(route('packages.index'));
    }

    /**
     * Display the specified Package.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Pacote não encontrado');

            return redirect(route('packages.index'));
        }

        return view('packages.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified Package.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $package = $this->packageRepository->find($id);
        $tags = '';
        if(!empty($package->tags)){            
            foreach($package->tags as $tag){
                $tags .= $tag->name . ",";
            }
        }

        if (empty($package)) {
            Flash::error('Pacote não encontrado');

            return redirect(route('packages.index'));
        }

        return view('packages.edit')->with(['package' => $package, 'tags' => $tags]);
    }

    /**
     * Update the specified Package in storage.
     *
     * @param int $id
     * @param UpdatePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackageRequest $request)
    {
        $package = $this->packageRepository->find($id);
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        if (empty($package)) {
            Flash::error('Pacote não encontrado');

            return redirect(route('packages.index'));
        }

        if($request->file('main_image')){
            if($package->main_image){
                $url = explode('/', $package->main_image);
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }
        }

        $package = $this->packageRepository->update($request->all(), $id);

        if($request->file('main_image')){            
            $path = Storage::disk('public')->put('package-images', $request->file('main_image'));
            $package->fill(['main_image' => asset($path)])->save();
        }

        $package->retag($tags);

        Flash::success('Pacote alterado com sucesso.');

        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified Package from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Pacote não encontrado');

            return redirect(route('packages.index'));
        }
        //Remove tip tagged tags
        $package->untag();
        
        $this->packageRepository->delete($id);

        Flash::success('Pacote excluído com sucesso.');

        return redirect(route('packages.index'));
    }
}
