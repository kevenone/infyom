<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class staffApiTest extends TestCase
{
    use MakestaffTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatestaff()
    {
        $staff = $this->fakestaffData();
        $this->json('POST', '/api/v1/staff', $staff);

        $this->assertApiResponse($staff);
    }

    /**
     * @test
     */
    public function testReadstaff()
    {
        $staff = $this->makestaff();
        $this->json('GET', '/api/v1/staff/'.$staff->id);

        $this->assertApiResponse($staff->toArray());
    }

    /**
     * @test
     */
    public function testUpdatestaff()
    {
        $staff = $this->makestaff();
        $editedstaff = $this->fakestaffData();

        $this->json('PUT', '/api/v1/staff/'.$staff->id, $editedstaff);

        $this->assertApiResponse($editedstaff);
    }

    /**
     * @test
     */
    public function testDeletestaff()
    {
        $staff = $this->makestaff();
        $this->json('DELETE', '/api/v1/staff/'.$staff->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/staff/'.$staff->id);

        $this->assertResponseStatus(404);
    }
}
