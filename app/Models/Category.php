<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version February 7, 2020, 12:08 pm UTC
 *
 * @property string name
 * @property string title
 * @property boolean avaliable
 * @property integer created_by
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'title',
        'slug',
        'avaliable',
        'visible',
        'special',
        'informativas',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'title' => 'string',
        'avaliable' => 'boolean',
        'visible' => 'boolean',
        'special' => 'boolean',
        'informativas' => 'boolean',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }


}
