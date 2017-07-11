<?php

use Faker\Factory as Faker;
use App\Models\staff;
use App\Repositories\staffRepository;

trait MakestaffTrait
{
    /**
     * Create fake instance of staff and save it in database
     *
     * @param array $staffFields
     * @return staff
     */
    public function makestaff($staffFields = [])
    {
        /** @var staffRepository $staffRepo */
        $staffRepo = App::make(staffRepository::class);
        $theme = $this->fakestaffData($staffFields);
        return $staffRepo->create($theme);
    }

    /**
     * Get fake instance of staff
     *
     * @param array $staffFields
     * @return staff
     */
    public function fakestaff($staffFields = [])
    {
        return new staff($this->fakestaffData($staffFields));
    }

    /**
     * Get fake data of staff
     *
     * @param array $postFields
     * @return array
     */
    public function fakestaffData($staffFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->text,
            'sex' => $fake->word,
            'phone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $staffFields);
    }
}
