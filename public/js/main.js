$(function () {
    /**
     * Ajax api call to display airports around the world by their Initial letter
     * 
     */
    $('.airport').click(function () {
        $(this).addClass('active');
        var url = "http://tripbuilder.dev/api/v1/airports";
        var init = $(this).attr('id');        
        var data = "?access_token="+$('input[name=token]').val()+"&init="+init;
        $.ajax({
            url: url+data,
            type: "GET",
            success: function (response) {
                var html = "<table class='table-striped padding-20 center-box'><tr><th>ID</th><th>AIRPORT NAME</th><th>IATA</th><th>ICAO</th><th>COUNTRY</th></tr>";
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
    });

});
