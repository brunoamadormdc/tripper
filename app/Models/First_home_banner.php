<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Conner\Tagging\Taggable;

/**
 * Class First_home_banner
 * @package App\Models
 * @version January 21, 2020, 6:19 pm UTC
 *
 * @property string image
 * @property string body
 * @property boolean published
 */
class First_home_banner extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'first_home_banners';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'body',
        'published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'body' => 'required'
    ];

    
}
