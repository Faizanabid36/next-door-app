$(document).ready(function () {
    $('#del-post-*').on('click', function () {
        console.log('here i am')
        let postId = this.id.split('-')[2]
        alert(postId)
    })
});
