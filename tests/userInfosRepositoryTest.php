<?php

use App\Models\userInfos;
use App\Repositories\userInfosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userInfosRepositoryTest extends TestCase
{
    use MakeuserInfosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var userInfosRepository
     */
    protected $userInfosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userInfosRepo = App::make(userInfosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateuserInfos()
    {
        $userInfos = $this->fakeuserInfosData();
        $createduserInfos = $this->userInfosRepo->create($userInfos);
        $createduserInfos = $createduserInfos->toArray();
        $this->assertArrayHasKey('id', $createduserInfos);
        $this->assertNotNull($createduserInfos['id'], 'Created userInfos must have id specified');
        $this->assertNotNull(userInfos::find($createduserInfos['id']), 'userInfos with given id must be in DB');
        $this->assertModelData($userInfos, $createduserInfos);
    }

    /**
     * @test read
     */
    public function testReaduserInfos()
    {
        $userInfos = $this->makeuserInfos();
        $dbuserInfos = $this->userInfosRepo->find($userInfos->id);
        $dbuserInfos = $dbuserInfos->toArray();
        $this->assertModelData($userInfos->toArray(), $dbuserInfos);
    }

    /**
     * @test update
     */
    public function testUpdateuserInfos()
    {
        $userInfos = $this->makeuserInfos();
        $fakeuserInfos = $this->fakeuserInfosData();
        $updateduserInfos = $this->userInfosRepo->update($fakeuserInfos, $userInfos->id);
        $this->assertModelData($fakeuserInfos, $updateduserInfos->toArray());
        $dbuserInfos = $this->userInfosRepo->find($userInfos->id);
        $this->assertModelData($fakeuserInfos, $dbuserInfos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteuserInfos()
    {
        $userInfos = $this->makeuserInfos();
        $resp = $this->userInfosRepo->delete($userInfos->id);
        $this->assertTrue($resp);
        $this->assertNull(userInfos::find($userInfos->id), 'userInfos should not exist in DB');
    }
}
