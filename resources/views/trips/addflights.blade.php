@extends('layouts.app')
@section('content')
<!--A view for testing API CALL: API/V1/flights POST-->
<div class="container text-center">    
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Add Flights</div>
            <div class='alert-success padding-10'>
                <input type="hidden" id="token" value="{{Session::get('access_token')}}">
                <input type="hidden" id="api_url" value="{{Session::get('api_url')}}">
                <form id="add">
                    <label for="trip-id">Trip id:</label>
                    <select name="trip_id">
                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <label for="start_airport_id">Start Airport id:</label>
                    <select name="start_airport">
                        <?php for ($i = 1; $i <= 100; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <label for="start_airport">End Airport id:</label>
                    <select name="end_airport">
                        <?php for ($i = 1; $i <= 200; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <br><tr><br>
                    <p><a onclick="addFlight()" class="pointer">Add</a></p>
                </form>
            </div>
            <div>
            </div>
        </div>    
    </div>
</div>
@endsection