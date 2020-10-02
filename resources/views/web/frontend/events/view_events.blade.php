@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner" style="color: black!important;">

        {{--        <div class="uk-flex uk-flex-between">--}}
        {{--            <h1 class="color-black"><i>Events in your community</i></h1>--}}
        {{--            <button class="button primary small circle pull-right" id="modal_button" data-toggle="modal"--}}
        {{--                    data-target="#postNewEvent">--}}
        {{--                <i class="uil-plus"> </i> Post An Event--}}
        {{--            </button>--}}
        {{--        </div>--}}
        @include('web.frontend.events.components.nav_links')
        <div class="uk-grid-large mt-5" uk-grid>
            <div class="uk-width-expand">
            @include('web.frontend.events.components.session_messages')
            <!-- Blog Post -->
                @foreach($events as $event)
                    <div class="blog-post">
                        <!-- Blog Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <div class="blog-post-thumbnail-inner">
                                <a href="{{route('event.show',$event['id'])}}">
                                    <img src="{{$event['event_cover_photo']}}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Blog Post Content -->
                        <div class="blog-post-content">
                            <div class="blog-post-content-info">
                                <span class="blog-post-info-tag button soft-danger">
                                    {{$event['category']['name']}}
                                </span>
                                <span class="blog-post-info-date">Posted: {{\Carbon\Carbon::parse($event['created_at'])->diffForHumans()}}</span>
                            </div>
                            <h4 class="mb-1">
                                <a class="text-dark" href="{{route('event.show',$event['id'])}}">
                                    {{$event['event_title']}}
                                </a>
                            </h4>
                            <p>
                                {{\Carbon\Carbon::parse($event['event_date']. ' '.$event['start_time'])
                                    ->isoFormat('ddd, MMM Do Y, h:mma')}}
                                <br>
                                {{$event['event_location']}}
                            </p>
                            <div class="mt-3">
                                @if(isset($page)&&$page=='all_events')
                                    <div style="width: 35%; float: left;" class="uk-flex-inline">
                                        <button id="going_event_id-{{$event['id']}}"
                                                onclick="goingToEvent('going','going_event_id-{{$event['id']}}')"
                                                class="mr-1 button primary small going-button">
                                            @if(isset($event['isGoing'])&& $event['isGoing']==1)
                                                <i class="uil-check-circle going_event_id-{{$event['id']}}-icon"></i>
                                            @endif
                                            <span class="going_event_id-{{$event['id']}}-text">Going</span>
                                        </button>
                                        <button id="maybe_event_id-{{$event['id']}}"
                                                onclick="goingToEvent('maybe','maybe_event_id-{{$event['id']}}')"
                                                class="ml-1 button warning small maybe-button">
                                            @if(isset($event['isMaybe']) &&$event['isMaybe']==1)
                                                <i class="uil-check maybe_event_id-{{$event['id']}}-icon"></i>
                                            @endif
                                            <span class="maybe_event_id-{{$event['id']}}-text">Maybe</span>
                                        </button>
                                    </div>
                                @endif
                                @if(isset($page)&&$page=='all_events')
                                    <div style="float: right" class="mt-1">
                                        @endif

                                        <span style=""><span
                                                id="count_going_{{$event['id']}}">{{$event['totalGoing']}}</span> Going</span>
                                        -
                                        <span style=""><span
                                                id="count_maybe_{{$event['id']}}">{{$event['totalMaybe']}}</span> Maybe</span>
                                        @if(isset($page)&&$page=='all_events')
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="uk-width-1-3@s">

                <div uk-sticky="offset:86;media: @m ; bottom:true">

                    <div class="uk-card-default rounded uk-overflow-hidden">
                        <div class="p-4 text-center">
                            <h3 class="uk-text-bold text-dark"><i>Community Events</i></h3>
                            <hr>
                            <p>Stay Connected to your Neighbours. Go and join in their events</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <form novalidate method="POST"
          enctype='multipart/form-data'
          action="{{route('event.store')}}">
        <div class="modal fade" id="postNewEvent" tabindex="-1" role="dialog"
             aria-labelledby="postNewEventTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="width:94%;margin: 0px auto">
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
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
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
                                      rows="5" placeholder="Event Description">{{old('event_description')}}</textarea>
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
                <div class="modal-content" style="width: 97%; margin: 0px auto">
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
                        <button type="button" class="btn btn-primary" id="modal_button2" disabled data-toggle="modal"
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
                <div class="modal-content" c>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Post New Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="error_message"></div>
                        <div class="mb-5 media-upload-image">
                            <a href="javascript: void(0);">
                                <img src="{{asset('salika/assets/images/icons/market.png')}}"
                                     id="display_cover_picture"
                                     class="rounded mr-75" alt="profile image" height="150"
                                     width="350"
                                     style="margin: 0px auto;">
                            </a>
                        </div>
                        <div class="media-body">
                            <div
                                class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                <label
                                    class="btn btn-sm small button primary cursor-pointer ml-50 mb-50 mb-sm-0 text-white"
                                    for="cover-upload">
                                    Upload new cover photo
                                </label>
                                <input onchange="loadCover(event)" type="file" name="banner_2"
                                       id="cover-upload"
                                       hidden>
                            </div>
                            <p class="ml-75 mt-50 text-dark"><small>Allowed JPG, GIF or
                                    PNG.
                                    Max
                                    size of
                                    5MB</small>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="modal_previous_button1"
                                    data-dismiss="modal">Previous
                            </button>
                            <input id="submit_button" type="submit" value="Post Event" style="float: right"
                                   class="uk-button rounded button primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer_scripts')
    @include('web.frontend.events.components.toastr_messages')
    <script>
        let loadCover = function (event) {
            let cover_image = document.getElementById('display_cover_picture');
            cover_image.src = URL.createObjectURL(event.target.files[0]);
        }
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

            let event_postal_code = document.getElementById('event_postal_code')
            let event_date = document.getElementById('event_date')
            let start_time = document.getElementById('start_time')
            let end_time = document.getElementById('end_time')
            let button2 = document.getElementById('modal_button2');
            document.getElementById('event_postal_code').onkeyup = function () {
                button2.disabled = !(event_postal_code.value.length > 0 && event_date.value.length > 0 && start_time.value.length > 0 && end_time.value.length > 0);
            }
            document.getElementById('event_date').onchange = function () {
                button2.disabled = !(event_postal_code.value.length > 0 && event_date.value.length > 0 && start_time.value.length > 0 && end_time.value.length > 0);
            }
            document.getElementById('start_time').onchange = function () {
                button2.disabled = !(event_postal_code.value.length > 0 && event_date.value.length > 0 && start_time.value.length > 0 && end_time.value.length > 0);
            }
            document.getElementById('end_time').onchange = function () {
                button2.disabled = !(event_postal_code.value.length > 0 && event_date.value.length > 0 && start_time.value.length > 0 && end_time.value.length > 0);
            }
        });

        function goingToEvent(idk, id) {
            console.log(id)
            let type = 1;
            if (idk === 'maybe')
                type = 2;
            let event_id = id.split('-')[1]
            $.ajax({
                type: 'GET',
                url: window.location.origin + '/going_to_event/' + event_id + '/' + type,
                success: function (data) {
                    console.log(data)
                    if (data.notGoing) {
                        let num = $(`#count_going_${event_id}`).text();
                        $(`#count_going_${event_id}`).html(parseInt(num) - 1)
                        $(`.${id}-icon`).remove()
                    } else if (data.notMaybe) {
                        let num = $(`#count_maybe_${event_id}`).text();
                        $(`#count_maybe_${event_id}`).html(parseInt(num) - 1)
                        $(`.${id}-icon`).remove()
                    } else if (data.isGoing) {
                        let test = $(`.maybe_event_id-${event_id}-icon`).remove()
                        if (test.length) {
                            let num = $(`#count_maybe_${event_id}`).text();
                            $(`#count_maybe_${event_id}`).html(parseInt(num) - 1)
                        }
                        $(`.${id}-text`).remove()
                        let num = $(`#count_going_${event_id}`).text();
                        $(`#count_going_${event_id}`).html(parseInt(num) + 1)
                        $(`<i class="uil-check-circle ${id}-icon"></i><span class="${id}-text">Going</span>`).appendTo('#' + id)
                    } else if (data.isMaybe) {
                        let test = $(`.going_event_id-${event_id}-icon`).remove()
                        if (test.length) {
                            let num = $(`#count_going_${event_id}`).text();
                            $(`#count_going_${event_id}`).html(parseInt(num) - 1)
                        }
                        $(`.${id}-text`).remove()
                        let num = $(`#count_maybe_${event_id}`).text();
                        $(`#count_maybe_${event_id}`).html(parseInt(num) + 1)
                        $(`<i class="uil-check ${id}-icon"></i><span class="${id}-text">Maybe</span>`).appendTo('#' + id)
                    }
                },
                error: function (data) {
                    alert('Some Error Occured. Try again')
                }
            });
        }
    </script>
@endsection
