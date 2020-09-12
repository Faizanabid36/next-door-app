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
                            {{--                            <span class="online-dot"></span>--}}
                        </div>
                        <div class="uk-width-expand">
                            <h3> {{$user->name}} </h3>
                            <p> 15 Matual friends </p>
                        </div>
                        <div class="uk-width-auto">
                                <span class="btn-option">
                                    <i class="icon-feather-more-horizontal"></i>
                                </span>
                            <div class="dropdown-option-nav"
                                 uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                <ul>
                                    <li>
                                        <span>
                                            <a href="{{route('user',$user->id)}}">
                                                <i class="uil-message"></i>Send message
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <a href="{{route('view_profile',$user->id)}}">
                                                <i class="uil-chat-bubble-user"></i>
                                                View Profile
                                            </a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
