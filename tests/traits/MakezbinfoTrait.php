<?php

use Faker\Factory as Faker;
use App\Models\zbinfo;
use App\Repositories\zbinfoRepository;

trait MakezbinfoTrait
{
    /**
     * Create fake instance of zbinfo and save it in database
     *
     * @param array $zbinfoFields
     * @return zbinfo
     */
    public function makezbinfo($zbinfoFields = [])
    {
        /** @var zbinfoRepository $zbinfoRepo */
        $zbinfoRepo = App::make(zbinfoRepository::class);
        $theme = $this->fakezbinfoData($zbinfoFields);
        return $zbinfoRepo->create($theme);
    }

    /**
     * Get fake instance of zbinfo
     *
     * @param array $zbinfoFields
     * @return zbinfo
     */
    public function fakezbinfo($zbinfoFields = [])
    {
        return new zbinfo($this->fakezbinfoData($zbinfoFields));
    }

    /**
     * Get fake data of zbinfo
     *
     * @param array $postFields
     * @return array
     */
    public function fakezbinfoData($zbinfoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'a1' => $fake->word,
            'a2' => $fake->randomDigitNotNull,
            'a3' => $fake->word,
            'aemail' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $zbinfoFields);
    }
}
