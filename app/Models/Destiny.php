<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Conner\Tagging\Taggable;

/**
 * Class Destiny
 * @package App\Models
 * @version January 17, 2020, 2:57 pm UTC
 *
 * @property string title
 * @property string body
 * @property string main_image
 * @property string secondary_image
 * @property boolean published
 */
class Destiny extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'destinies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'body',
        'main_image',
        'secondary_image',
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
        'main_image' => 'string',
        'secondary_image' => 'string',
        'published' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'body' => 'required',        
    ];

    public function photos()
    {
        return $this->hasMany('App\Models\Destiny_photo');
    }

    
}
