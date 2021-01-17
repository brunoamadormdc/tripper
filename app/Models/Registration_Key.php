<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Registration_Key
 * @package App\Models
 * @version January 22, 2020, 8:22 pm UTC
 *
 * @property string key
 * @property boolean status
 */
class Registration_Key extends Model
{
    use SoftDeletes;

    public $table = 'registration__keys';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'key',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key' => 'required'
    ];

    
}
