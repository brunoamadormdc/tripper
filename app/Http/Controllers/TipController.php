<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipRequest;
use App\Http\Requests\UpdateTipRequest;
use App\Repositories\TipRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Tip;
//Storage
use Illuminate\Support\Facades\Storage;

class TipController extends AppBaseController
{
    /** @var  TipRepository */
    private $tipRepository;

    public function __construct(TipRepository $tipRepo)
    {
        $this->tipRepository = $tipRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Tip.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        

        if(isset($request->tag)){
            $tips = Tip::withAnyTag([$request->tag])->paginate(10);
        }else{
            $tips = $this->tipRepository->paginate(10);
        }

        return view('tips.index')
            ->with('tips', $tips);
    }

    /**
     * Show the form for creating a new Tip.
     *
     * @return Response
     */
    public function create()
    {
        return view('tips.create');
    }

    /**
     * Store a newly created Tip in storage.
     *
     * @param CreateTipRequest $request
     *
     * @return Response
     */
    public function store(CreateTipRequest $request)
    {
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        $tip = $this->tipRepository->create($input);

        if($request->file('image')){
            $path = Storage::disk('public')->put('tip-images', $request->file('image'));
            $tip->fill(['image' => asset($path)])->save();
        }

        $tip->tag($tags);

        Flash::success('Dica salva com sucesso.');

        return redirect(route('tips.index'));
    }

    /**
     * Display the specified Tip.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tip = $this->tipRepository->find($id);

        if (empty($tip)) {
            Flash::error('Dica não encontrada');

            return redirect(route('tips.index'));
        }

        return view('tips.show')->with('tip', $tip);
    }

    /**
     * Show the form for editing the specified Tip.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tip = $this->tipRepository->find($id);
        $tags = '';
        if(!empty($tip->tags)){            
            foreach($tip->tags as $tag){
                $tags .= $tag->name . ",";
            }
        }

        if (empty($tip)) {
            Flash::error('Dica não encontrada');

            return redirect(route('tips.index'));
        }

        return view('tips.edit')->with(['tip' => $tip, 'tags' => $tags]);
    }

    /**
     * Update the specified Tip in storage.
     *
     * @param int $id
     * @param UpdateTipRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipRequest $request)
    {
        $tip = $this->tipRepository->find($id);
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);

        if (empty($tip)) {
            Flash::error('Dica não encontrada');

            return redirect(route('tips.index'));
        }

        if($request->file('image')){
            if($tip->image){
                $url = explode('/', $tip->image);
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }
        }

        $tip = $this->tipRepository->update($request->all(), $id);

        if($request->file('image')){            
            $path = Storage::disk('public')->put('tip-images', $request->file('image'));
            $tip->fill(['image' => asset($path)])->save();
        }

        $tip->retag($tags);

        Flash::success('Dica alterada com sucesso.');

        return redirect(route('tips.index'));
    }

    /**
     * Remove the specified Tip from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tip = $this->tipRepository->find($id);

        if (empty($tip)) {
            Flash::error('Dica não encontrada');

            return redirect(route('tips.index'));
        }
        
        //Remove tip tagged tags
        $tip->untag();

        $this->tipRepository->delete($id);

        Flash::success('Dica excluída com sucesso.');

        return redirect(route('tips.index'));
    }
}
