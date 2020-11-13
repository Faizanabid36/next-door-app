@section('modal')
    <div id="addNewModal" uk-modal>
        <div class="uk-modal-dialog rounded-lg">
            <form
                id="newForm"
                novalidate method="POST"
                enctype="multipart/form-data"
                action={{action($action)}} >
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle"><i>Add new Item</i></h4>
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @include('web.frontend.components.modal_category_selector')
                    <div class="mb-3">
                        <input type="text" name="subject" class="uk-input uk-form-small text-dark"
                               placeholder="Subject" required="true">
                    </div>
                    <div class="mb-3">
                            <textarea id="body" name="body" class="uk-textarea uk-form-small text-dark" rows="6"
                                      required placeholder="Message"></textarea>
                    </div>
                    <div class="media-upload-image" id="media-upload-image"></div>
                </div>
                <div class="modal-footer">
                    <div style="flex: auto" class="px-0 d-flex flex-sm-row flex-column justify-content-start">
                        <label class="btn btn-sm small button primary cursor-pointer ml-50 mb-sm-0 text-white"
                               for="cover-upload">
                            <i class="uil-image"></i>
                            Upload new cover photo
                        </label>
                        <input type="file" name="post_attachments[]"
                               id="cover-upload"
                               multiple
                               hidden>
                    </div>
                    <button class="button uk-button-default uk-modal-close" type="button">Close</button>
                    <input type="submit" value="Post" style="float: right"
                           class="btn btn-primary medium rounded">
                </div>
            </form>
        </div>
    </div>

@endsection

@section('footer_scripts')
    <script>
        $('#cover-upload').on('change', function (e) {
            let files = e.target.files;
            $.each(files, async function (i, file) {

                let reader = await new FileReader();
                await reader.readAsDataURL(file);
                reader.onload = await function (e) {
                    if (file.type.match('image')) {
                        let template = '<div style="position:relative;">' +
                            '<div onclick="alert(`faizan`)" class="close" style="cursor: pointer;right:5px;position: absolute;">' +
                            '<span>&times;</span>' +
                            '</div>' +
                            `<img class="mx-1" src="${e.target.result}" style="width: 80px!important;height: 80px !important;border-radius: 10px"/>` +
                            '</div>';
                        $('.media-upload-image').append($(template));
                    } else {
                        let src = "https://mk0theshotsuimyah8q1.kinstacdn.com/wp-content/plugins/video-thumbnails/default.jpg";
                        let template = '<div style="position:relative;">' +
                            '<div onclick="alert(`faizan`)" class="close" style="cursor: pointer;right:5px;position: absolute;">' +
                            '<span>&times;</span>' +
                            '</div>' +
                            `<img class="mx-1" src="${src}" style="width: 80px!important;height: 80px !important;border-radius: 10px"/>` +
                            '</div>';
                        $('.media-upload-image').append($(template));
                    }
                }
            })
        });


        $(document).ready(function () {
            let page = 1;
            load_more(page)
            $(window).scroll(function () { //detect page scroll
                if ($(window).scrollTop() + $(window).height() + 2 >= $(document).height()) {
                    page++;
                    load_more(page);
                }
            });

            $('#newForm').submit(function (event) {
                event.preventDefault();
                let formData = new FormData();
                let body = $("#body").val();
                let subject = $("input[name=subject]").val();
                let section = $('#section').val()
                let files = [];
                for (let i = 0; i < $("#cover-upload")[0].files.length; i++) {
                    files.push($("#cover-upload")[0].files[i]);
                    formData.append(`post_attachments[${i}]`,files[i])
                }
                let _token = $('meta[name="csrf-token"]').attr('content');

                formData.append('subject',subject)
                formData.append('section',section)
                formData.append('body',body)
                formData.append('_token',_token)
                toastr.options.closeButton = true
                $.ajax({
                    url: "{{action($action)}}",
                    type: "POST",
                    processData: false,
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    dataType: 'json',
                    data: formData,
                    success: function (res) {
                        $('#feed-area').prepend($(res.post))
                        if (res.success) {
                            $("#addNewModal .uk-close").click()
                            $("#cover-upload").val(null);
                            $("#body").val('');
                            $("input[name=subject]").val('');
                            $('#section').val('')
                            //$("[data-dismiss=modal]").trigger({type: "click"});
                            toastr.success(res.success, 'Success', {timeOut: 5000});
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            })
        })
    </script>
@endsection
