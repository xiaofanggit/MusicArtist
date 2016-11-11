$(function () {
    /**
     * RESTFUL API URL
     */
    var url = "http://tripbuilder.dev/api/v1/"; 
    
    /**
     * Ajax api call to display airports around the world by their Initial letter
     * 
     */
    $('.airport').click(function () {        
        var init = $(this).attr('id');
        var data = "airports?access_token="+$('input[name=token]').val()+"&init="+init;
        $.ajax({
            url: url+data,
            type: "GET",
            success: function (response) {
                //API call is not in success or no results, show nothing
                if (response['status'] != 200 || response['airports'].length == 0 ){
                    $('#list-area').html('No result!');
                    return;
                }
                var html = "<br><table class='table-striped padding-20 center-box'><tr><th>ID</th><th>AIRPORT NAME</th><th>IATA</th><th>ICAO</th><th>COUNTRY</th></tr>";
                $.each(response['airports'], function(index, p ) {
                    html += "<tr><td>"+p['id']+"</td><td>"+p['airport_name']+"</td>";
                    html += "<td>"+p['IATA']+"</td><td>"+p['ICAO']+"</td><td>"+p['country']+"</td></tr>";
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
        var id = $(this).attr('id'); 
        var url = "http://tripbuilder.dev/api/v1/flights?id="+id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                //API call is not in success or no results, show nothing
                if (response['status'] != 200 || response['flights'].length == 0 ){
                    $('#list-area').html('No result!');
                    return;
                }
                alert(JSON.stringify(response));
                var html = "<br><table class='table-striped padding-20 center-box'><tr><th>TRIP ID</th><th colspan='2'>SOURCE AIRPORT NAME</th><th colspan='2'>DESTINATION AIRPORT NAME</th></tr>";
                $.each(response['flights'], function(index, p ) {
                    html += "<tr><td>"+p['trip_id']+"</td><td colspan=2>"+p['start_name']+"</td>";
                    html += "<td colspan=2>"+p['end_name']+"</td></tr>";
                });
                html += "</table>";
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
