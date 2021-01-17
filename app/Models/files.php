<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Conner\Tagging\Taggable;

/**
 * Class Banner
 * @package App\Models
 * @version January 21, 2020, 10:34 pm UTC
 *
 * @property string title
 * @property string image
 * @property string link
 * @property string body
 * @property string promotion
 * @property string location
 * @property boolean published
 */
class Files extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'files';
    

    public $fillable = [
        'id',
        'name',
        'path',
        'file',
        'created_at',
        'updated_at',
        
    ];
    
    public function getAll() {
        return $this->paginate(10);
    }
    
    public function salvar($req) {
         if($req->file('arquivo')){
            $arquivo = $req->file('arquivo');
            $name =  'vtripper'.'_'.time().'.'.$arquivo->getClientOriginalExtension();
            $folder = '/files';
            $filepath = 'http://vtripper.com.br'.$folder .'/'. $name;
            $caminho = $folder .'/'. $name;
            $upload = $arquivo->storeAs($folder,$name,'public');
          }
         $salva = new Files();
         $salva->name = $req->name;
         $salva->path = $filepath;
         $salva->file = $caminho;
         $salva->save();
         if ($salva) {
             return true;
         }
         else {
             return false;
         }
    }
    
    public function excluir($id) {
        $delete = $this->findorfail($id);
        $path = $delete->file;
        unlink(public_path($path));
        $delete->delete();
        if ($delete) {
            return true;
        }
        else {
            return false;
        }
    }
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
   
    
    /**
     * Validation rules
     *
     * @var array
     */
   
    
}
