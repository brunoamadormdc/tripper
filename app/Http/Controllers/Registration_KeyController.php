<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegistration_KeyRequest;
use App\Http\Requests\UpdateRegistration_KeyRequest;
use App\Repositories\Registration_KeyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Hash;

class Registration_KeyController extends AppBaseController
{
    /** @var  Registration_KeyRepository */
    private $registrationKeyRepository;

    public function __construct(Registration_KeyRepository $registrationKeyRepo)
    {
        $this->registrationKeyRepository = $registrationKeyRepo;
        $this->middleware(['auth','hasadminbadge','hasadminsuper']);
    }

    /**
     * Display a listing of the Registration_Key.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $registrationKeys = $this->registrationKeyRepository->paginate(10);

        return view('registration__keys.index')
            ->with('registrationKeys', $registrationKeys);
    }

    /**
     * Show the form for creating a new Registration_Key.
     *
     * @return Response
     */
    public function create()
    {
        return view('registration__keys.create');
    }

    /**
     * Store a newly created Registration_Key in storage.
     *
     * @param CreateRegistration_KeyRequest $request
     *
     * @return Response
     */
    public function store(CreateRegistration_KeyRequest $request)
    {
        $input = $request->all();
        $input['key'] = \Crypt::encrypt($input['key']);

        $registrationKey = $this->registrationKeyRepository->create($input);

        Flash::success('Chave salva com sucesso.');

        return redirect(route('registrationKeys.index'));
    }

    /**
     * Display the specified Registration_Key.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $registrationKey = $this->registrationKeyRepository->find($id);

        if (empty($registrationKey)) {
            Flash::error('Chave não encontrada com sucesso');

            return redirect(route('registrationKeys.index'));
        }

        return view('registration__keys.show')->with('registrationKey', $registrationKey);
    }

    /**
     * Show the form for editing the specified Registration_Key.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $registrationKey = $this->registrationKeyRepository->find($id);

        if (empty($registrationKey)) {
            Flash::error('Chave não encontrada com sucesso');

            return redirect(route('registrationKeys.index'));
        }

        return view('registration__keys.edit')->with('registrationKey', $registrationKey);
    }

    /**
     * Update the specified Registration_Key in storage.
     *
     * @param int $id
     * @param UpdateRegistration_KeyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegistration_KeyRequest $request)
    {
        $registrationKey = $this->registrationKeyRepository->find($id);

        if (empty($registrationKey)) {
            Flash::error('Chave não encontrada com sucesso');

            return redirect(route('registrationKeys.index'));
        }
        $input = $request->all();        
        $input['key'] = \Crypt::encrypt(\Crypt::decrypt($input['key']));
        $registrationKey = $this->registrationKeyRepository->update($input, $id);

        Flash::success('Status da chave alterada com sucesso.');

        return redirect(route('registrationKeys.index'));
    }

    /**
     * Remove the specified Registration_Key from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $registrationKey = $this->registrationKeyRepository->find($id);

        if (empty($registrationKey)) {
            Flash::error('Chave não encontrada com sucesso');

            return redirect(route('registrationKeys.index'));
        }

        $this->registrationKeyRepository->delete($id);

        Flash::success('Chave excluída com sucesso.');

        return redirect(route('registrationKeys.index'));
    }
}
