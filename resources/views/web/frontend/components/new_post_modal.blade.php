@section('modal')
    <div id="addNewModal" uk-modal>
        <div class="uk-modal-dialog rounded-lg">
            <form
                id="newForm"
                novalidate method="POST"
                enctype='multipart/form-data'
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
                </div>
                <div class="modal-footer">
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
                let body = $("#body").val();
                let subject = $("input[name=subject]").val();
                let section = $('#section').val()
                let _token = $('meta[name="csrf-token"]').attr('content');
                toastr.options.closeButton = true
                $.ajax({
                    url: "{{action($action)}}",
                    type: "POST",
                    data: {
                        body: body,
                        subject: subject,
                        section: section,
                        _token: _token
                    },
                    success: function (res) {
                        $('#feed-area').prepend($(res.post))
                        if (res.success) {
                            $("#addNewModal .uk-close").click()
                            //$("[data-dismiss=modal]").trigger({type: "click"});
                            toastr.success(res.success, 'Success', {timeOut: 5000});
                        }
                    },
                    error: function (error) {
                        if (error.responseJSON.errors.subject)
                            toastr.warning(error.responseJSON.errors.subject, 'Error', {timeOut: 5000});
                        if (error.responseJSON.errors.section)
                            toastr.warning(error.responseJSON.errors.section, 'Error', {timeOut: 5000});
                    }
                });
            })
        })
    </script>
@endsection
