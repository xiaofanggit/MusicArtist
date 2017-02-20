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
                        'artistTotalTrackNumber' => ['total' => 66]
                     ]
                 );
        /**
         *
         * status: true,
        artistTotalTrackNumber: - {
        total: 46
        },
        artistTracks: - [
        - {
        artistName: "Jack Johnson",
        currency: "USD",
        country: "USA",
        collectionName: "To the Sea",
        collectionPrice: "9.99",
        id: 44,
        trackName: "Better Together (feat. Paula Fuga)",
        trackPrice: "-1.00"
        },
         *
         *
         *
         */
    }
}
