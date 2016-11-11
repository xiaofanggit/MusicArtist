@extends('layouts.app')
@section('content')
<div class="container text-center">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class='alert-success padding-10'>
                    <?php foreach (range('A', 'Z') as $letter){?>
                            <a class="airport pointer" id="<?php echo $letter;?>"><?php echo $letter;?></a>
                    <?php }?>
                </div>
                <input type="hidden" id="token" value="{{Session::get('access_token')}}">
                <input type="hidden" id="api_url" value="{{Session::get('api_url')}}">
                <div id="list-area"><div>  
            </div>
    </div>
</div>
@endsection