<?php

use App\Models\zbinfo;
use App\Repositories\zbinfoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class zbinfoRepositoryTest extends TestCase
{
    use MakezbinfoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var zbinfoRepository
     */
    protected $zbinfoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->zbinfoRepo = App::make(zbinfoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatezbinfo()
    {
        $zbinfo = $this->fakezbinfoData();
        $createdzbinfo = $this->zbinfoRepo->create($zbinfo);
        $createdzbinfo = $createdzbinfo->toArray();
        $this->assertArrayHasKey('id', $createdzbinfo);
        $this->assertNotNull($createdzbinfo['id'], 'Created zbinfo must have id specified');
        $this->assertNotNull(zbinfo::find($createdzbinfo['id']), 'zbinfo with given id must be in DB');
        $this->assertModelData($zbinfo, $createdzbinfo);
    }

    /**
     * @test read
     */
    public function testReadzbinfo()
    {
        $zbinfo = $this->makezbinfo();
        $dbzbinfo = $this->zbinfoRepo->find($zbinfo->id);
        $dbzbinfo = $dbzbinfo->toArray();
        $this->assertModelData($zbinfo->toArray(), $dbzbinfo);
    }

    /**
     * @test update
     */
    public function testUpdatezbinfo()
    {
        $zbinfo = $this->makezbinfo();
        $fakezbinfo = $this->fakezbinfoData();
        $updatedzbinfo = $this->zbinfoRepo->update($fakezbinfo, $zbinfo->id);
        $this->assertModelData($fakezbinfo, $updatedzbinfo->toArray());
        $dbzbinfo = $this->zbinfoRepo->find($zbinfo->id);
        $this->assertModelData($fakezbinfo, $dbzbinfo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletezbinfo()
    {
        $zbinfo = $this->makezbinfo();
        $resp = $this->zbinfoRepo->delete($zbinfo->id);
        $this->assertTrue($resp);
        $this->assertNull(zbinfo::find($zbinfo->id), 'zbinfo should not exist in DB');
    }
}
