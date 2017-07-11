<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class zbinfoApiTest extends TestCase
{
    use MakezbinfoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatezbinfo()
    {
        $zbinfo = $this->fakezbinfoData();
        $this->json('POST', '/api/v1/zbinfos', $zbinfo);

        $this->assertApiResponse($zbinfo);
    }

    /**
     * @test
     */
    public function testReadzbinfo()
    {
        $zbinfo = $this->makezbinfo();
        $this->json('GET', '/api/v1/zbinfos/'.$zbinfo->id);

        $this->assertApiResponse($zbinfo->toArray());
    }

    /**
     * @test
     */
    public function testUpdatezbinfo()
    {
        $zbinfo = $this->makezbinfo();
        $editedzbinfo = $this->fakezbinfoData();

        $this->json('PUT', '/api/v1/zbinfos/'.$zbinfo->id, $editedzbinfo);

        $this->assertApiResponse($editedzbinfo);
    }

    /**
     * @test
     */
    public function testDeletezbinfo()
    {
        $zbinfo = $this->makezbinfo();
        $this->json('DELETE', '/api/v1/zbinfos/'.$zbinfo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/zbinfos/'.$zbinfo->id);

        $this->assertResponseStatus(404);
    }
}
