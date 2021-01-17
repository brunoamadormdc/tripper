<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Conner\Tagging\Taggable;

/**
 * Class Teste
 * @package App\Models
 * @version January 16, 2020, 9:50 pm UTC
 *
 * @property string title
 * @property string body
 */
class Teste extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'testes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'body' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
