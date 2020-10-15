$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function readNotification(notificationId) {
    $.ajax({
        type: 'POST',
        url: '/readNotifications',
        data: {notification_id: notificationId},
        success: function (data) {
            window.location = data.url
        }
    });
}

function load_more(page) {
    $.ajax({
        url: '?page=' + page,
        type: "get",
        datatype: "html",
        // beforeSend: function () {
        //     $('#laoding-data').css('visibility', 'visible')
        // }
    }).done(function (data) {
        $('#laoding-data').css('visibility', 'hidden')
        $("#feed-area").append(data); //append data into #results element
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}

function test(id) {
    alert(id)
}

