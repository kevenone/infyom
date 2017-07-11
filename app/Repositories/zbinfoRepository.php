<?php

namespace App\Repositories;

use App\Models\zbinfo;
use InfyOm\Generator\Common\BaseRepository;

class zbinfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'a1',
        'a2',
        'a3',
        'aemail'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return zbinfo::class;
    }
}
