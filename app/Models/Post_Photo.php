<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post_Photo
 * @package App\Models
 * @version February 4, 2020, 2:39 pm UTC
 *
 * @property string image
 * @property integer post_id
 * @property boolean published
 * @property integer created_by
 * @property integer updated_by
 */
class Post_Photo extends Model
{
    use SoftDeletes;

    public $table = 'post__photos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'post_id',
        'published',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'post_id' => 'integer',
        'published' => 'boolean',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    
}
