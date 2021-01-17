<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestandoRequest;
use App\Http\Requests\UpdateTestandoRequest;
use App\Repositories\TestandoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TestandoController extends AppBaseController
{
    /** @var  TestandoRepository */
    private $testandoRepository;

    public function __construct(TestandoRepository $testandoRepo)
    {
        $this->testandoRepository = $testandoRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Testando.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testandos = $this->testandoRepository->all();

        return view('testandos.index')
            ->with('testandos', $testandos);
    }

    /**
     * Show the form for creating a new Testando.
     *
     * @return Response
     */
    public function create()
    {
        return view('testandos.create');
    }

    /**
     * Store a newly created Testando in storage.
     *
     * @param CreateTestandoRequest $request
     *
     * @return Response
     */
    public function store(CreateTestandoRequest $request)
    {
        $input = $request->all();

        $testando = $this->testandoRepository->create($input);

        Flash::success('Testando saved successfully.');

        return redirect(route('testandos.index'));
    }

    /**
     * Display the specified Testando.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testando = $this->testandoRepository->find($id);

        if (empty($testando)) {
            Flash::error('Testando not found');

            return redirect(route('testandos.index'));
        }

        return view('testandos.show')->with('testando', $testando);
    }

    /**
     * Show the form for editing the specified Testando.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testando = $this->testandoRepository->find($id);

        if (empty($testando)) {
            Flash::error('Testando not found');

            return redirect(route('testandos.index'));
        }

        return view('testandos.edit')->with('testando', $testando);
    }

    /**
     * Update the specified Testando in storage.
     *
     * @param int $id
     * @param UpdateTestandoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestandoRequest $request)
    {
        $testando = $this->testandoRepository->find($id);

        if (empty($testando)) {
            Flash::error('Testando not found');

            return redirect(route('testandos.index'));
        }

        $testando = $this->testandoRepository->update($request->all(), $id);

        Flash::success('Testando updated successfully.');

        return redirect(route('testandos.index'));
    }

    /**
     * Remove the specified Testando from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testando = $this->testandoRepository->find($id);

        if (empty($testando)) {
            Flash::error('Testando not found');

            return redirect(route('testandos.index'));
        }

        $this->testandoRepository->delete($id);

        Flash::success('Testando deleted successfully.');

        return redirect(route('testandos.index'));
    }
}
