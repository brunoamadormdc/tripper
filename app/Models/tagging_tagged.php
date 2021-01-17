<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Conner\Tagging\Taggable;

/**
 * Class Post
 * @package App\Models
 * @version February 4, 2020, 2:12 pm UTC
 *
 * @property string title
 * @property string subtitle
 * @property string summary
 * @property string body
 * @property string price
 * @property string booking_link
 * @property string booking_link_text
 * @property string external_link
 * @property string font_text
 * @property string font_link
 * @property string main_image
 * @property string secondary_image
 * @property string page
 * @property integer category_id
 * @property boolean published
 * @property integer created_by
 * @property integer updated_by
 */
class tagging_tagged extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'tagging_tagged';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'taggable_id',
        'taggable_type',
        'tag_name',
        'tag_slug',
        
       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
   

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

   
}
