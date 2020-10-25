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
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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

function like_dislike_post(el) {
    let data = el.id.split('-')
    const op = data[0]
    const post_id = data[2]
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log('hitting ', window.origin + '/feed/like_dislike_post')
    $.ajax({
        url: window.origin + '/feed/like_dislike_post',
        type: 'POST',
        data: {_token: CSRF_TOKEN, post_id: post_id, op: op, user_id: auth_id},
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) {
            console.log(data)
            if (data.response) {
                toastr.success(data.operation, 'Success', {timeOut: 5000});
                $(`.state-${post_id}`).html($(data.response))
            }
        },
        error: function (error) {
            console.log(error.data)
        }
    });
}

function post_comment(el, id = null) {
    let data = el.id.split('-')
    const post_id = data[3]
    const comment_text = $(`#input-post-comment-${post_id}`).val()
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: window.origin + '/feed/post_comment',
        type: 'POST',
        data: {_token: CSRF_TOKEN, post_id: post_id, comment_text: comment_text, user_id: auth_id},
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) {
            console.log(data)
            if (data.success) {
                toastr.success(data.success, 'Success', {timeOut: 5000});
                $(`#post-all-comments-${post_id}`).append($(data.comment))
                $(`#input-post-comment-${post_id}`).val('')
            }
        },
        error: function (error) {
            console.log(error.data)
        }
    });
}

function write_comment(el) {
    document.addEventListener('keyup', function (e) {
        e.stopImmediatePropagation()
        if (e.keyCode === 13) {
            let data = el.id.split('-')
            const post_id = data[3]
            const comment_text = $(`#input-post-comment-${post_id}`).val()
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: window.origin + '/feed/post_comment',
                type: 'POST',
                data: {_token: CSRF_TOKEN, post_id: post_id, comment_text: comment_text, user_id: auth_id},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    console.log(data)
                    if (data.success) {
                        toastr.success(data.success, 'Success', {timeOut: 5000});
                        $(`#post-all-comments-${post_id}`).append($(data.comment))
                        $(`#input-post-comment-${post_id}`).val('')
                    }
                },
                error: function (error) {
                    console.log(error.data)
                }
            });
        }
    })
}

function delete_comment_from_post(post, comment) {
    console.log(post,comment)
    const post_id = post
    const comment_id = comment
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: window.origin + '/feed/delete_comment',
        type: 'POST',
        data: {_token: CSRF_TOKEN, post_id: post_id, comment_id: comment_id, user_id: auth_id},
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) {
            console.log(data)
            if (data.success) {
                toastr.success(data.success, 'Success', {timeOut: 5000});
                $(`#post-${post_id}-comment-${comment_id}`).slideUp(600)
            }
        },
        error: function (error) {
            console.log(error.data)
        }
    });
}

