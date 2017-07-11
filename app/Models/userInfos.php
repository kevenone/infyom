<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class userInfos
 * @package App\Models
 * @version July 11, 2017, 1:59 am UTC
 */
class userInfos extends Model
{
    use SoftDeletes;

    public $table = 'user_infos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'phonr'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phonr' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
