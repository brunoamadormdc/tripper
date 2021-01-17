<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post_Video
 * @package App\Models
 * @version February 4, 2020, 5:25 pm UTC
 *
 * @property string video_link
 * @property string video_id
 * @property boolean published
 * @property integer created_by
 * @property integer updated_by
 * @property integer post_id
 */
class Post_Video extends Model
{
    use SoftDeletes;

    public $table = 'post__videos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'video_link',
        'video_id',
        'published',
        'created_by',
        'updated_by',
        'post_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'video_link' => 'string',
        'video_id' => 'string',
        'published' => 'boolean',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'post_id' => 'integer'
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
