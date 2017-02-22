<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WebserviceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetArtistTracks()
    {
        $response = $this->json('get', '/api/webServices/artistTracks?artistId=1&page=1');
        $response->assertResponseStatus(200)
                 ->seeJson(
                     [
                         'status' => true,
                        //'artistTotalTrackNumber' => ['total' => 48]
                     ]
                 );
    }
}
