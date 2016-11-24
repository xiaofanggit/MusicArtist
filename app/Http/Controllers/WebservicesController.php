<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use guzzlehttp\Client;

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
     * 
     * @para $request: string, users search string
     * 
     * return Json: true: success, false:failed.
     */
    public function getMusicArtists(Request $request)
    {
        $status = config('customer.HTTP_OK');
        $msg = config('customer.insert_success');
		//Use guzzle to get json data
        $client = new \GuzzleHttp\Client();        
        $res = $client->get(config('customer.api_url')."term=".$request->input('term'));        
        $body = $res->getBody();
        $obj = json_decode($body);        
        foreach ($obj->results as $r){
            try
            { 
                //Search to see if this artist already exist, if not insert
                $artistId = DB::table('artists')->firstOrCreate(
                    ['artistID' => $r->artistId, 'artistName' => $r->artistName, 'country' => $r->country, 'currency', $r->currency]
                );

                //If the collection not exist, insert ino collection table.
                $collectionId = DB::table('collections')->firstOrCreate(
                    ['collectionID' => $r->collectionId, 'collectionName' => $r->collectionName, 'collectionPrice' => $r->collectionPrice, 'collectionArtistId', $artistId]
                );
                //If the track not exist, insert into track table.
                DB::table('tracks')->firstOrCreate(
                    ['collectionID' => $collectionId, 'collectionName' => $r->collectionName, 'collectionPrice' => $r->collectionPrice, 'collectionArtistId', $artistId]
                );
            }catch (Exception $e){   
                $status = config('constants.HTTP_BAD');
                $msg = config('customer.insert_fail');
            }
            
        }
        return \Response::json(['status' => $status, 'msg' => $msg]);
    }
    
    public function getArtistTracks(){
        //Todo
    }
    
    /**
     * Delete the track
     * @param Request $request: track id, input by users
     */
    public function deleteTrack(Request $request){
        $result = false;
        $status = config('customer.HTTP_OK');
        $msg ="";
        try
        {            
            $result = \Response::json(Track::findOrFail($request->input('trackId'))->delete());            
            $msg = "The track deleted successfully";
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
