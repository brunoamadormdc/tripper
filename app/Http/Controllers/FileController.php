<?php

namespace App\Http\Controllers;

use App\Models\files;
use App\Http\Requests\UpdateTipRequest;
use App\Repositories\TipRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Tip;
//Storage
use Illuminate\Support\Facades\Storage;

class FileController extends AppBaseController
{

public function index(files $files) {
    $files = $files->getAll();
    return view('files.index')->with('files',$files);
}    

public function create() {
    return view('files.create');
}

public function store(Request $request, files $files) {
    if ($files->salvar($request)) {
        Flash::success('Arquivo salvo com sucesso');
        return redirect(route('files.index'));
    }
    else {
        Flash::error('Houve um erro ao salvar o arquivo');
        return redirect(route('files.index'));
        
    }
}


public function destroy($id,files $files) {
    if($files->excluir($id)) {
        Flash::success('Arquivo excluído com sucesso');
        return redirect(route('files.index'));
    }
    else {
        Flash::error('Houve um erro ao excluir o arquivo');
        return redirect(route('files.index'));
    }
}

}
