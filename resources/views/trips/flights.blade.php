@extends('layouts.app')
@section('content')
<!--A view for testing API CALL: /api/v1/flights Get-->
<div class="container text-center" onload="alert('aaaa');">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Flights List</div>
                <input type="hidden" id="token" value="{{Session::get('access_token')}}">
                <input type="hidden" id="api_url" value="{{Session::get('api_url')}}">
                <div class='padding-10 alert-success'>
                    <?php foreach (range(1, 100) as $trip_num){?>
                            <a class="flight pointer" id="<?php echo $trip_num;?>"><?php echo $trip_num;?></a>
                    <?php }?>
                </div>                
                <div id="list-area"><div>  
            </div>
    </div>
</div>
@endsection