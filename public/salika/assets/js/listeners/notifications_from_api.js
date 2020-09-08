$(document).ready(function () {
    Echo.private('review-added-on-business.' + auth_id)
        .listen('ReviewAddedOnBusiness', (e) => {
                let newNotification = $('<li>\n' +
                    `    <a href="${window.location.origin + '/business/view/page/' + e.review.business_id}">\n` +
                    '        <span class="notification-avatar">\n' +
                    `           <img src="${e.review.user.avatar}" alt="">\n` +
                    '        </span>\n' +
                    '        <span class="notification-icon bg-gradient-warning">\n' +
                    '            <i class="icon-feather-star"></i>\n' +
                    '        </span>\n' +
                    '        <span class="notification-text">\n' +
                    `           <strong>${e.review.user.name}.</strong> left review on your business page\n` +
                    `           <br> <span class="time-ago"> ${moment(e.review.created_at).fromNow()} </span>\n` +
                    '        </span>\n' +
                    '    </a>\n' +
                    '</li>')
                $('#notification-list').prepend(newNotification)
                let notificationCounter = document.getElementById('notification-counter').innerText
                document.getElementById('notification-counter').innerText = parseInt(notificationCounter) + 1
            }
        )
    Echo.private('recommendation-added-on-business.' + auth_id)
        .listen('BusinessRecommendation', (e) => {
            console.log(e)
            let newNotification = $('<li>\n' +
                `    <a href="${window.location.origin + '/business/view/page/' + e.business_id}">\n` +
                '        <span class="notification-avatar">\n' +
                `           <img src="${e.recommendedBy.avatar}" alt="">\n` +
                '        </span>\n' +
                '        <span class="notification-icon bg-gradient-danger">\n' +
                '            <i class="icon-feather-heart"></i>\n' +
                '        </span>\n' +
                '        <span class="notification-text">\n' +
                `           <strong>${e.recommendedBy.name}.</strong> recommended your business page\n` +
                `           <br> <span class="time-ago"> ${moment(e.created_at).fromNow()} </span>\n` +
                '        </span>\n' +
                '    </a>\n' +
                '</li>')
            $('#notification-list').prepend(newNotification)
            let notificationCounter = document.getElementById('notification-counter').innerText
            document.getElementById('notification-counter').innerText = parseInt(notificationCounter) + 1
        })
});
