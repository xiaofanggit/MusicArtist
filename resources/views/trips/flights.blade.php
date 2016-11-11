@extends('layouts.app')
@section('content')
<div class="container text-center">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class='padding-10 alert-success'>
                    <?php foreach (range(1, 100) as $trip_num){?>
                            <a class="flight pointer" id="<?php echo $trip_num;?>"><?php echo $trip_num;?></a>
                    <?php }?>
                </div>
                <input type="hidden" name="token" value="{{Session::get('access_token')}}">
                <div id="list-area"><div>  
            </div>
    </div>
</div>
@endsection