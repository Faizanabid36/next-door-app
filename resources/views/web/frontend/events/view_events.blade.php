@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner" style="color: black!important;">

        <div class="uk-flex uk-flex-between">
            <h1 class="color-black"><i>Free & Sale Items</i></h1>
            <button class="button primary small circle pull-right" id="modal_button" data-toggle="modal"
                    data-target="#postNewEvent">
                <i class="uil-plus"> </i> Post New Item
            </button>
        </div>
    </div>
@endsection
@section('modal')
    <form novalidate method="POST"
          enctype='multipart/form-data'
          action="{{route('event.store')}}">
        <div class="modal fade" id="postNewEvent" tabindex="-1" role="dialog" aria-labelledby="postNewEventTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle ">Post New Item</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="first_modal">

                        @csrf
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1">Event Category </h5>
                            <select name="event_category_id" id="event_category_id" class="uk-input uk-form-small">
                                <option value="" disabled selected>Choose Category</option>
                                <option value="c1">Concert</option>
                                <option value="c2">Concert 2</option>
                                <option value="c3">Concert 3</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Title </h5>
                            <input type="text" name="event_title" id="event_title" value="{{old('event_title')}}"
                                   class="uk-input uk-form-small" placeholder="Event Title">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Description </h5>
                            <textarea name="event_description" id="event_description" class="uk-textarea uk-form-small"
                                      rows="6" placeholder="Event Description">{{old('event_description')}}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close_all" data-dismiss="modal">Close
                        </button>
                        <button type="button" disabled class="btn btn-primary" id="modal_button1" data-toggle="modal"
                                data-target="#postNewEvent-2">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="postNewEvent-2" tabindex="-1" role="dialog" aria-labelledby="postNewEvent2Title"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Post New Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <div id="postal_message"></div>
                            <h5 class="uk-text-bold mb-1"> Event Address </h5>
                            <input type="text" name="event_postal_code" value="{{old('event_postal_code')}}"
                                   id="event_postal_code" class="uk-input uk-form-small"
                                   placeholder="Event Postal Code">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Event Date </h5>
                            <input type="date" name="event_date" id="event_date" class="uk-input uk-form-small"
                                   placeholder="Date">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Start Time </h5>
                            <input type="time" name="start_time" class="uk-input uk-form-small"
                                   id="start_time" placeholder="Date">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> End Time </h5>
                            <input type="time" name="end_time" class="uk-input uk-form-small"
                                   id="end_time" placeholder="Date">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary" id="modal_button2" data-toggle="modal"
                                data-target="#postNewEvent-3">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="postNewEvent-3" tabindex="-1" role="dialog" aria-labelledby="postNewEvent3Title"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="height: 450px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Post New Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Event My Address </h5>
                            <input type="text" name="event_postal_code" value="{{old('event_postal_code')}}"
                                   class="uk-input uk-form-small" placeholder="Event Postal Code">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Event Date </h5>
                            <input type="date" name="event_date" class="uk-input uk-form-small"
                                   placeholder="Date">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Start Time </h5>
                            <input type="time" name="start_time" class="uk-input uk-form-small"
                                   placeholder="Date">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> End Time </h5>
                            <input type="time" name="end_time" class="uk-input uk-form-small"
                                   placeholder="Date">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="modal_previous_button1"
                                data-dismiss="modal">Previous
                        </button>
                        <input type="submit" value="Post Item" style="float: right"
                               class="uk-button rounded button primary">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function () {
            console.log("ready!");
            let event_title = document.getElementById('event_title')
            let event_description = document.getElementById('event_description')
            let event_category_id = document.getElementById('event_category_id')
            let button1 = document.getElementById('modal_button1');
            document.getElementById('event_title').onkeyup = function () {
                button1.disabled = !(event_title.value.length > 0 && event_description.value.length > 0 && event_category_id.value.length > null);
            }
            document.getElementById('event_description').onkeyup = function () {
                button1.disabled = !(event_title.value.length > 0 && event_description.value.length > 0 && event_category_id.value.length > null);
            }
            document.getElementById('event_category_id').onchange = function () {
                button1.disabled = !(event_title.value.length > 0 && event_description.value.length > 0 && event_category_id.value.length > null);
            }

            //Modal 2 Working

            $('#event_postal_code').on('keyup', function () {
                let postal_code = $('#event_postal_code').val();
                $.ajax({
                    type: 'GET',
                    url: window.location.origin + '/check_postal_code/' + postal_code,
                    success: function (data) {
                        if (data.success) {
                            $('#postal-success').remove()
                            $('#postal-error').remove()
                            $(`<p id="postal-success" class="alert alert-success">${data.success}</p>`).appendTo('#postal_message')
                        } else {
                            $('#postal-error').remove()
                            $('#postal-success').remove()
                            $(`<p id="postal-error" class="alert alert-danger">${data.error}</p>`).appendTo('#postal_message')
                        }
                    },
                    error: function (data) {
                        $(`<p class="alert alert-danger">${data.success}</p>`).appendTo('#postal_message')
                    }
                });
            })


            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName)
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            $(".file-input-0").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName)
                $(this).siblings(".file-label-0").addClass("selected").html(fileName);
            });
            $(".file-input-1").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName)
                $(this).siblings(".file-label-1").addClass("selected").html(fileName);
            });
        });
    </script>
@endsection
