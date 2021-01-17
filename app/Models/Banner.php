<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class Banner extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'banners';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'image',
        'link',
        'body',
        'promotion',
        'location',
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
        'image' => 'string',
        'link' => 'string',
        'promotion' => 'string',
        'location' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
