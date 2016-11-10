@extends('layouts.app')
@section('content')
<div class="container text-center">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class='alert-success'>
                    <?php foreach (range('A', 'Z') as $letter){?>
                            <a class="airport" id="<?php echo $letter;?>"><?php echo $letter;?></a>
                    <?php }?>
                </div>
                <input type="hidden" name="token" value="{{Session::get('access_token')}}">
                <div id="list-area"><div>  
            </div>
    </div>
</div>
@endsection