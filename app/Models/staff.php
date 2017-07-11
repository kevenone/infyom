<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class staff
 * @package App\Models
 * @version July 10, 2017, 7:42 am UTC
 */
class staff extends Model
{
    use SoftDeletes;

    public $table = 'staff';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'sex',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'max:100'
    ];

    
}
