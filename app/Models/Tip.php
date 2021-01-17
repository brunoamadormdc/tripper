<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Conner\Tagging\Taggable;

/**
 * Class Tip
 * @package App\Models
 * @version January 20, 2020, 1:50 pm UTC
 *
 * @property string title
 * @property string body
 * @property string image
 */
class Tip extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'tips';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'body',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required'
    ];

    
}
