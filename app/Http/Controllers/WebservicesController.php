<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use guzzlehttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

use App\Model\Artist;
/**
 * Webservices controller
 */
class WebservicesController extends Controller
{
   /**
    * Webservices construct to set passport
    */
    public function __construct() {
    }
    /**
     * Get music artists list from itunes api
     * For example,https://itunes.apple.com/search?term=jack+johnson
     * http://musicartisthomestead.app/api/webServices/artists?term=jack+johnson
     * 
     * @para string $request string, users search string
     *
     * return Json data: true: success, false:failed.
     */
    public function artists(Request $request)
    {
        //Use guzzle to get json data
        $client = new \GuzzleHttp\Client();        
        $res = $client->get(config('customer.api_url')."term=".$request->input('term'));        
        $body = $res->getBody();
        $obj = json_decode($body);
        $status = config('customer.HTTP_OK');
        $msg = config('customer.insert_success');
        if (!empty($obj->results)){
            foreach ($obj->results as $r){
                try
                {
                    //Search to see if this artist already exist, if not insert
                    if (!empty($r)) {
                        $artist = \App\Model\Artist::firstOrCreate(
                            ['artistId' => $r->artistId, 'artistName' => $r->artistName, 'country' => $r->country, 'currency' => $r->currency]
                        );
                    }
                   
                    //If the collection not exist, insert ino collection table.
                    if (!empty($r->collectionId)) {
                        $collection = \App\Model\Collection::firstOrCreate(
                            ['collectionId' => $r->collectionId, 'collectionName' => $r->collectionName, 'collectionPrice' => $r->collectionPrice, 'artistId' => $artist->id]
                        );
                    }
                   
                    if (!empty($collection->id)) {
                        //If the track not exist, insert into track table.
                        \App\Model\Track::firstOrCreate(
                            ['trackId' => $r->trackId, 'trackName' => $r->trackName, 'trackPrice' => $r->trackPrice, 'collectionId' => $collection->id]
                        );
                    }
                }catch (Exception $e){   
                    $status = config('customer.HTTP_BAD');
                    $msg = config('customer.insert_fail');
                }

            }
        }else{
            $status = config('customer.HTTP_BAD');
            $msg = config('customer.empty');
        }
       return \Response::json(['status' => $status, 'msg' => $msg]);
    }

    /**
     * http://musicartisthomestead.app/api/webServices/artistTracks?artistId=1&page=3
     * Get artist's tracks
     * @param Request $request
     * @return json data
     */
    public function artistTracks(Request $request){
        $artistId = $request->get('artistId');
        if (empty($artistId)){
            return;
        }
        $page = $request->input('page');
        $start = ($page <= 1) ? 0 : ($page-1) * config('customer.MAXIMUM_TRACKS')-1;
        $artistTotalTrackNumber = 0;
        $artist = new Artist;
        $response = $artistTracks = array();

        try{
            $artistTotalTrackNumber = $artist->findTotalArtistTracksNumber($artistId);
            $response['status'] = config('customer.HTTP_OK');
        }catch(Exception $e){
            $response['status'] = config('customer.HTTP_BAD');
        }

        $response['artistTotalTrackNumber'] = $artistTotalTrackNumber;

        try {
            $artistTracks = $artist->getArtistTracks($artistId, $start);
            $response['status'] = config('customer.HTTP_OK');
        }catch(Exception $e){
            $response['status'] = config('customer.HTTP_BAD');
        }

        $response['artistTracks'] = $artistTracks;
        return \Response::json($response);
    }

    public function artistTracksWithRedis(Request $request){
        $artistId = $request->get('artistId');
        if (empty($artistId)){
            return;
        }
        $page = $request->input('page');
        $start = ($page <= 1) ? 0 : ($page-1) * config('customer.MAXIMUM_TRACKS')-1;
        $artistTotalTackNumber = 0;
        $artist = new Artist;
        $response = array();
        $trackChanged = $request->session()->get('trackChanged') ? true : false;
        if (Redis::exists('artistTotalTrackNumber-'.$artistId.'-'.$page) && !$trackChanged){
            $artistTotalTrackNumber = Redis::get('artistTotalTrackNumber-'.$artistId.'-'.$page);
        }else{
            try{
                $artistTotalTrackNumber = $artist->findTotalArtistTracksNumber($artistId);
                Redis::set('artistTotalTackNumber-'.$artistId.'-'.$page, $artistTotalTackNumber);
                $response['status'] = config('customer.HTTP_OK');
                //$request->session()->put('trackChanged', false);
            }catch(Exception $e){
                $response['status'] = config('customer.HTTP_BAD');
            }
        }
        $response['artistTotalTrackNumber'] = $artistTotalTrackNumber;
        if (Redis::exists('artistTracks-'.$artistId.'-'.$page) && !$trackChanged){
            $artistTracks = json_decode(Redis::get('artistTracks-'.$artistId.'-'.$page));
        }else {
            try {
                $artistTracks = $artist->getArtistTracks($artistId, $start);
                Redis::set('artistTracks-'.$artistId.'-'.$page, json_encode($artistTracks));
                $response['status'] = config('customer.HTTP_OK');
                //$request->session()->put('trackChanged', false);
            }catch(Exception $e){
                $response['status'] = config('customer.HTTP_BAD');
            }
        }
        $response['artistTracks'] = $artistTracks;
        return \Response::json($response);
    }
    
    /**
     * Delete the track
     * @param Request $request: id, int, track id.input by users
     */
    public function deleteTrack(Request $request){
        $result = false;
        $status = config('customer.HTTP_OK');
        $msg ="";
        try
        {            
            $result = \App\Model\Track::findOrFail($request->input('id'))->delete();            
            $msg = "The track deleted successfully";

            $request->session()->put('trackChanged', true);
        }
        catch (Exception $e)
        {
            $status = config('constants.HTTP_BAD');
            $msg = $e->getMessage();
        }
        finally
        {   
            return \Response::json(['result' => $result, 'status' => $status, 'msg' => $msg]);
        }        
    }
}
