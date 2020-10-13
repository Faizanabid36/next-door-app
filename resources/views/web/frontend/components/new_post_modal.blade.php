@section('modal')
    <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form novalidate method="POST"
                      enctype='multipart/form-data'
                      action={{action($action)}}>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i>Add new Item</i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @include('web.frontend.components.modal_category_selector')
                        <div class="mb-3">
                            <input type="text" name="title" class="uk-input uk-form-small text-dark"
                                   placeholder="Subject" required="true">
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="uk-textarea uk-form-small text-dark" rows="6"
                                      required placeholder="Message"></textarea>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark rounded" data-dismiss="modal">Close</button>
                        <input type="submit" value="Post" style="float: right"
                               class="btn btn-primary medium rounded">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
