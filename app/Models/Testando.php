<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Testando
 * @package App\Models
 * @version January 31, 2020, 4:17 pm UTC
 *
 * @property string title
 * @property string body
 */
class Testando extends Model
{
    use SoftDeletes;

    public $table = 'testandos';
    

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
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
