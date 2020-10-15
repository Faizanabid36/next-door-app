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

function deletePost(postEl) {
    let id = postEl.id.split('-')[2]
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: window.origin + '/post/remove',
        type: 'POST',
        data: {_token: CSRF_TOKEN, post_id: id},
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) {
            console.log(data)
            if (data.success)
                toastr.success(data.success, 'Success', {timeOut: 5000});
        },
        error: function (error) {
            console.log(error)
        }
    });
    $(`#post-${id}`).fadeOut(800, function () {
        $(this).remove()
    })
}

