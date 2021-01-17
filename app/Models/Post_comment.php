<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post_comment
 * @package App\Models
 * @version February 27, 2020, 3:47 pm UTC
 *
 * @property integer post_id
 * @property integer user_id
 * @property string email
 * @property string name
 * @property string webpage
 * @property string body
 * @property boolean published
 */
class Post_comment extends Model
{
    use SoftDeletes;

    public $table = 'post_comments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'post_id',
        'user_id',
        'email',
        'name',
        'webpage',
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
        'post_id' => 'integer',
        'user_id' => 'integer',
        'email' => 'string',
        'name' => 'string',
        'webpage' => 'string',
        'published' => 'boolean'
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
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
}
