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
