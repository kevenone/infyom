<?php

namespace App\Repositories;

use App\Models\userInfos;
use InfyOm\Generator\Common\BaseRepository;

class userInfosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phonr'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return userInfos::class;
    }
}
