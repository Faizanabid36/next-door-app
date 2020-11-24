@extends('layouts.salika.index')


@section('content')
    <div class="main_content_inner">
        @include('web.frontend.public_agencies.components.nav_link')
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m fead-area" id="feed-area">
                <div id="laoding-data"><h2 class="text-dark text-center">
                        Please Wait, while the data is being loaded...!
                    </h2>
                </div>
            </div>
            @include('web.frontend.public_agencies.components.side_info')
        </div>
    </div>
@endsection

@include('web.frontend.components.new_post_modal', [$action='PostController@store'])


@section('modal')
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
         aria-labelledby="messageModal"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content" style="width:94%;margin: 0px auto">
                <form id="reportForm" action="{{route('report_item.store')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="report_event"><i>Report Post</i></h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="first_modal">
                        @csrf
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Why do you want to report this event? </h5>
                            <input type="hidden" name="type" value="post" id="type">
                            <input type="hidden" name="item_id" value="" id="item_id">
                            <textarea required name="body" id="body" class="uk-textarea uk-form-small rounded"
                                      rows="6" placeholder="Type Reason Here...">{{old('body')}}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close_all1" data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="uil-message"></i>
                            Report Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
