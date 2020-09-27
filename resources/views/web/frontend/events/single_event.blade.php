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
                        <div class="user-details-card pt-0 ml-4 mb-2" style="width: 80%;float:left;">
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
                        <div style="width: 20%; float:right;">
                            <button data-toggle="modal"
                                    data-target="#messageModal"
                                    id="message-{{$user->name}}-{{$user->id}}"
                                    class="sendMessageButton text-right button primary small rounded mt-1">
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

    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog"
         aria-labelledby="messageModal"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content" style="width:94%;margin: 0px auto">
                <form action="{{route('event.message')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sendMessageTo">Send Message To</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="first_modal">

                        @csrf
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Message Body </h5>
                            <input type="hidden" name="to_user" value="" id="to_user">
                            <textarea name="message_body" id="message_body" class="uk-textarea uk-form-small rounded"
                                      rows="6" placeholder="Type Message">{{old('message_body')}}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close_all" data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="send_message">
                            <i class="uil-message"></i>
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function () {
            $('.sendMessageButton').on('click', function (event) {
                let id = event.target.id
                let name = id.split('-')[1]
                let user_id = id.split('-')[2]
                $('#sendMessageTo').text(`Send message to ${name}`)
                $('#to_user').val(`${user_id}`)
            })
        })
    </script>
@endsection
