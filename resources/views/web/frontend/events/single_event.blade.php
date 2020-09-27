@extends('layouts.salika.index')

@section('content')
    <div class="uk-width-4-5@m m-auto mb-5">
        <div class="uk-card-default rounded mt-lg-4" uk-grid>
            <div class="uk-width-1-2@m mt-5">
                <h2 class="text-dark"><i>{{$event->event_title}}</i></h2>
                <h5><span>Community: {{$event->event_location}}</span></h5>
                <h5>
                    <span>Time: {{\Carbon\Carbon::parse($event['event_date']. ' '.$event['start_time'])
                                    ->isoFormat('ddd, MMM Do Y, h:mma')}}
                    </span>
                </h5>
                Category:
                <span class="blog-post-info-tag button danger">
                    {{$event->category->name}}
                </span>
            </div>
            <div class="uk-width-1-2@m text-right ">
                <img src="{{$event->event_cover_photo}}" class="rounded" alt="">
            </div>
        </div>


        <div class="uk-card-default rounded mt-lg-4" uk-grid>
            <div class="uk-width-2-3@m mt-3 mb-3">
                <h2 class="text-dark"><i>Description</i></h2>
                <hr>
                <h5>
                    {{$event->event_description}}
                </h5>
                <h5>
                    <hr>
                    <i class="uil-users-alt"></i>
                    Going: {{$totalGoing}}
                    -
                    Maybe: {{$totalMaybe}}
                </h5>
            </div>
            <div class="uk-width-1-3@m mt-3 mb-3">
                <div>
                    <h5 class="mb-1">Posted By:</h5>
                </div>
                <div class="user-details-card pt-0">
                    <div class="user-details-card-avatar" style="max-width: 50px">
                        <img src="{{$event->creator->avatar}}" alt="">
                    </div>
                    <div class="user-details-card-name">
                        <h4 class="mb-0">
                            <a class="text-dark" href="{{route('view_profile',$event->creator->id)}}">{{$event->creator->name}}</a>
                        </h4>
                        <span> {{$event->created_at->diffForHumans()}} </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-card-default rounded mt-lg-4" uk-grid>
            <div class="uk-width-3-3@m mt-3 mb-3">
                <h2 class="text-dark"><i>People who showed interest</i></h2>
                <hr>
                @foreach($usersGoing  as $user)
                    <div style="display: flex">
                        <div class="user-details-card pt-0 ml-4 mb-2" style="width: 70%;float:left;">
                            <div class="user-details-card-avatar" style="max-width: 50px">
                                <img src="{{$user->avatar}}">
                            </div>
                            <div class="user-details-card-name">
                                <h4 class="mb-0">
                                    <a class="text-dark" href="{{route('view_profile',$user->id)}}">{{$user->name}}</a>
                                </h4>
                                <span class="text-dark"> {{$user->address}} </span>
                            </div>
                        </div>
                        <div style="width: 30%; float:right;">
                            <button class=" text-right button primary small rounded mt-1">
                                <i class="uil-message"></i>
                                Message
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@section('modal')
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
                        <h5 class="uk-text-bold mb-1"> Title </h5>
                        <input type="text" name="body" id="body" value="{{old('body')}}"
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
@endsection
