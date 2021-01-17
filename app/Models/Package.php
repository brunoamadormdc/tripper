<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Conner\Tagging\Taggable;

/**
 * Class Package
 * @package App\Models
 * @version January 20, 2020, 7:13 pm UTC
 *
 * @property string title
 * @property string subtitle
 * @property string body
 * @property string main_image
 * @property number price
 * @property boolean published
 */
class Package extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'packages';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'subtitle',
        'body',
        'main_image',
        'price',
        'published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'subtitle' => 'string',
        'main_image' => 'string',
        'price' => 'float',
        'published' => 'boolean'
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
    
    public function tagstagged()
    {
        return $this->tags;
    }
    
}
