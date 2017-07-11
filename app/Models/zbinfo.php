<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class zbinfo
 * @package App\Models
 * @version July 10, 2017, 7:53 am UTC
 */
class zbinfo extends Model
{
    use SoftDeletes;

    public $table = 'zbinfos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'a1',
        'a2',
        'a3',
        'aemail'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'a1' => 'string',
        'a2' => 'integer',
        'a3' => 'date',
        'aemail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    
}
