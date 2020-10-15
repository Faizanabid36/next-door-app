function load_more(page) {
    $.ajax({
        url: '?page=' + page,
        type: "get",
        datatype: "html",
        beforeSend: function()
        {
            $('#laoding-data').css('visibility','visible')
        }
    }).done(function (data) {
        $('#laoding-data').css('visibility','hidden')
        $("#feed-area").append(data); //append data into #results element
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
