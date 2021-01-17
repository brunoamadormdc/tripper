<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Destiny_photo
 * @package App\Models
 * @version January 17, 2020, 6:33 pm UTC
 *
 * @property string image
 * @property integer destiny_id
 */
class Destiny_photo extends Model
{
    use SoftDeletes;

    public $table = 'destiny_photos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'destiny_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'destiny_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
        'destiny_id' => 'required'
    ];

    public function destiny()
    {
        return $this->belongsTo('App\Models\Destiny', 'destiny_id');
    }
    
}
