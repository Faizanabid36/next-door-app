@extends('layouts.salika.index')
@section('content')
    <div class="main_content_inner">


        <h2 class="mt-lg-5"> Neighbours </h2>

        <div class="uk-child-width-1-3@m" uk-grid>
            @foreach($users as $user)
                <div>
                    <div class="friend-card">
                        <div class="uk-width-auto">
                            <img src="{{$user->avatar}}" alt="{{$user->name}}">
                            <span class="online-dot"></span>
                        </div>
                        <div class="uk-width-expand">
                            <h3 class="text-dark"> {{$user->name}} </h3>
                            <div>
                                <a href="{{route('user',$user->id)}}" class="text-dark">
                                    <i class="uil-message"></i>Send message
                                </a>
                            </div>
                            <div>
                                <a href="{{route('view_profile',$user->id)}}" class="text-dark">
                                    <i class="uil-chat-bubble-user"></i>View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
