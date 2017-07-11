<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userInfosApiTest extends TestCase
{
    use MakeuserInfosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateuserInfos()
    {
        $userInfos = $this->fakeuserInfosData();
        $this->json('POST', '/api/v1/userInfos', $userInfos);

        $this->assertApiResponse($userInfos);
    }

    /**
     * @test
     */
    public function testReaduserInfos()
    {
        $userInfos = $this->makeuserInfos();
        $this->json('GET', '/api/v1/userInfos/'.$userInfos->id);

        $this->assertApiResponse($userInfos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateuserInfos()
    {
        $userInfos = $this->makeuserInfos();
        $editeduserInfos = $this->fakeuserInfosData();

        $this->json('PUT', '/api/v1/userInfos/'.$userInfos->id, $editeduserInfos);

        $this->assertApiResponse($editeduserInfos);
    }

    /**
     * @test
     */
    public function testDeleteuserInfos()
    {
        $userInfos = $this->makeuserInfos();
        $this->json('DELETE', '/api/v1/userInfos/'.$userInfos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/userInfos/'.$userInfos->id);

        $this->assertResponseStatus(404);
    }
}
