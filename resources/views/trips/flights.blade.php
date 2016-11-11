@extends('layouts.app')
@section('content')
<div class="container text-center" onload="alert('aaaa');">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class='padding-10 alert-success'>
                    <?php foreach (range(1, 100) as $trip_num){?>
                            <a class="flight pointer" id="<?php echo $trip_num;?>"><?php echo $trip_num;?></a>
                    <?php }?>
                </div>
                <input type="hidden" name="token" value="{{Session::get('access_token')}}">
                <input type="hidden" name="api_url" value="{{Session::get('api_url')}}">
                <div id="list-area"><div>  
            </div>
    </div>    
    <div class="row">            
        <a onclick="deleteFlight()">Delete fligfht</a>
    </div>
</div>
@endsection