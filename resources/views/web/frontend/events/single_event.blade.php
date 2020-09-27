@extends('layouts.salika.index')

@section('content')
    <div class="uk-width-4-5@m m-auto">
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
                    <div uk-grid>
                        <div class="uk-width-2-3@m user-details-card pt-0 ml-4 mb-2">
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
                        <div class="uk-width-1-3@m">
                            <button class=" text-right button primary small rounded">Message </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
