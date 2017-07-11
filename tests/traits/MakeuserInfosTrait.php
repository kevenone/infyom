<?php

use Faker\Factory as Faker;
use App\Models\userInfos;
use App\Repositories\userInfosRepository;

trait MakeuserInfosTrait
{
    /**
     * Create fake instance of userInfos and save it in database
     *
     * @param array $userInfosFields
     * @return userInfos
     */
    public function makeuserInfos($userInfosFields = [])
    {
        /** @var userInfosRepository $userInfosRepo */
        $userInfosRepo = App::make(userInfosRepository::class);
        $theme = $this->fakeuserInfosData($userInfosFields);
        return $userInfosRepo->create($theme);
    }

    /**
     * Get fake instance of userInfos
     *
     * @param array $userInfosFields
     * @return userInfos
     */
    public function fakeuserInfos($userInfosFields = [])
    {
        return new userInfos($this->fakeuserInfosData($userInfosFields));
    }

    /**
     * Get fake data of userInfos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeuserInfosData($userInfosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'phonr' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $userInfosFields);
    }
}
