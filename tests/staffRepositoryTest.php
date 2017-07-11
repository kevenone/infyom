<?php

use App\Models\staff;
use App\Repositories\staffRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class staffRepositoryTest extends TestCase
{
    use MakestaffTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var staffRepository
     */
    protected $staffRepo;

    public function setUp()
    {
        parent::setUp();
        $this->staffRepo = App::make(staffRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatestaff()
    {
        $staff = $this->fakestaffData();
        $createdstaff = $this->staffRepo->create($staff);
        $createdstaff = $createdstaff->toArray();
        $this->assertArrayHasKey('id', $createdstaff);
        $this->assertNotNull($createdstaff['id'], 'Created staff must have id specified');
        $this->assertNotNull(staff::find($createdstaff['id']), 'staff with given id must be in DB');
        $this->assertModelData($staff, $createdstaff);
    }

    /**
     * @test read
     */
    public function testReadstaff()
    {
        $staff = $this->makestaff();
        $dbstaff = $this->staffRepo->find($staff->id);
        $dbstaff = $dbstaff->toArray();
        $this->assertModelData($staff->toArray(), $dbstaff);
    }

    /**
     * @test update
     */
    public function testUpdatestaff()
    {
        $staff = $this->makestaff();
        $fakestaff = $this->fakestaffData();
        $updatedstaff = $this->staffRepo->update($fakestaff, $staff->id);
        $this->assertModelData($fakestaff, $updatedstaff->toArray());
        $dbstaff = $this->staffRepo->find($staff->id);
        $this->assertModelData($fakestaff, $dbstaff->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletestaff()
    {
        $staff = $this->makestaff();
        $resp = $this->staffRepo->delete($staff->id);
        $this->assertTrue($resp);
        $this->assertNull(staff::find($staff->id), 'staff should not exist in DB');
    }
}
