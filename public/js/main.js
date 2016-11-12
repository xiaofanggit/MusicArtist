/**
 * The usage of RESTFUL API
 */
//api_url: http://tripbuilder.dev/api/v1/ . This variable was saved at: C:\xampp\htdocs\TripBuilderClient\config\customer.php
var api_url = $('#api_url').val()+'/api/v1';
var token = $('#token').val(); //The API access token 
$(function () {
    /**
     * Ajax api call to display airports around the world by their Initial letter
     * 
     */
    $('.airport').click(function () {
        $.ajax({
            url: api_url + "/airports",
            type: "GET",
            data: {init : $(this).attr('id')},
            useDefaultXhrHeader: false,
            beforeSend : function(request) {
                // set header
                request.setRequestHeader("Accept","application/json");
                request.setRequestHeader("Authorization", "Bearer " + token);
            },
            success: function (response) {
                //API call is not in success or no results, show nothing
                if (response['status'] != 200 || response['airports'].length == 0) {
                    $('#list-area').html('No result!');
                    return;
                }
                var html = "<br><table class='table-striped padding-20 center-box'><tr><th>ID</th><th>AIRPORT NAME</th><th>IATA</th><th>ICAO</th><th>COUNTRY</th></tr>";
                $.each(response['airports'], function (index, p) {
                    html += "<tr><td>" + p['id'] + "</td><td>" + p['airport_name'] + "</td>";
                    html += "<td>" + p['IATA'] + "</td><td>" + p['ICAO'] + "</td><td>" + p['country'] + "</td></tr>";
                });
                html += "</table>";
                $('#list-area').html(html);

            },
            error: function (xhr) {
                alert(JSON.stringify(xhr));
            }
        });
        $('.airport').removeClass('active');
        $(this).addClass('active');

    });

    /**
     * Ajax api call to display a trip flights
     * 
     */
    $('.flight').click(function () {
        $.ajax({
            url: api_url + "/flights",
            data: {id: $(this).attr('id')},
            beforeSend : function(request) {
                // set header
                request.setRequestHeader("Accept","application/json");
                request.setRequestHeader("Authorization", "Bearer " + token);
            },
            type: "GET",
            success: function (response) {
                //API call is not in success or no results, show nothing
                if (response['status'] != 200 || response['flights'].length == 0) {
                    $('#list-area').html('No result!');
                    return;
                }
                var html = "<br><table class='table-striped padding-20 center-box'><tr><th>Trip ID</th><th>Flight ID</th><th colspan='2'>Source Airport Name</th><th colspan='2'>Destination Airport Name</th><th>Action</th></tr>";
                $.each(response['flights'], function (index, p) {
                    html += "<tr id='flight" + p['id'] + "'><td>" + p['trip_id'] + "</td><td>" + p['id'] + "</td><td colspan='2'>" + p['start_name'] + "</td>";
                    html += "<td colspan=2>" + p['end_name'] + "</td><td colspan='2' class='padding-5'><a onclick='deleteFlight(" + p['id'] + ")' class='btn btn-primary delete' id='" + p['id'] + "'> Delete flight</a></td></tr>";
                });
                html += "</table><br>";
                $('#list-area').html(html);
            },
            error: function (xhr) {
                alert(JSON.stringify(xhr));
            }
        });
        $('.flight').removeClass('active');
        $(this).addClass('active');
    });
});
/**
 * Add a flight into a trip
 * @returns 
 */
function addFlight() {
    $.ajax({
        url: api_url + '/flights',
        type: 'post',
        beforeSend : function(request) {
            // set header
            request.setRequestHeader("Accept","application/json");
            request.setRequestHeader("Authorization", "Bearer " + token);
        },
        data: $("#add").serialize(),
        success: function (response) {
            //API call is not in success or flight already exsit.
            if (response['status'] != 200) {
                if (response['msg'] == undefined){
                    alert('Failed! The flight already exsit.');
                }else{
                    alert(response['msg']);
                }
                return;
            }
            alert(response['msg']+'You could continue adding other flight.');
        },
        error: function (xhr) {
            alert(JSON.stringify(xhr));
        }
    });
}
/**
 * Delete a trip flight
 * @param int id: trip id
 * @returns 
 */
function deleteFlight(id) {
    $.ajax({
        url: api_url + '/flights',
        type: 'delete',
        data: { id: id},
        beforeSend : function(request) {
            // set header
            request.setRequestHeader("Accept","application/json");
            request.setRequestHeader("Authorization", "Bearer " + token);
        },
        success: function (response) {
            //API call is not in success or flight already exsit.
            if (response['status'] != 200) {
                alert(response['msg']);
                return;
            }
            alert(response['msg']);
            $('#flight'+id).remove();
        },
        error: function (xhr) {
            alert(JSON.stringify(xhr));
        }
    });
}
