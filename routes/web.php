<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * The route to get API token from http://tripbuilderclient.dev
 */
Route::get('/getAPIToken', function () {

    $query = http_build_query([
        'client_id' => '1',
        'redirect_uri' => config('customer.client_url').'/callback',
        'response_type' => 'code',
        'scope' => '*'
    ]);

    return redirect(config('customer.api_url').'/oauth/authorize?'.$query);
});

/**
 * The call back function after get the access token from API
 */
Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post(config('customer.api_url').'/oauth/token', [
        'form_params' => [
            'client_id' => '1',
            'client_secret' => 'c9dbGcg7Ej7D6De1qG7MSNJobhBEP4YV5qonhOh1',
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('customer.client_url').'/callback',
            'code' => $request->code,
        ],
    ]);
   $token =  json_decode((string) $response->getBody(), true);
   Session::set('access_token', $token['access_token']); 
   Session::set('api_url', config('customer.api_url')); 
   return view('displaytoken', ['token' => $token]);
});

/*Home page*/
Route::get('/', function(){
    return view('trips.airports');
});

/*Get airport list page*/
Route::get('/airports', function(){
    return view('trips.airports');
});

/*Get flights list page*/
Route::get('/flights', function(){
    return view('trips.flights');
});

/*Add a flight into a trip*/
Route::get('/addFlights', function(){
    return view('trips.addflights');
});
