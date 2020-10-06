@extends('layouts.salika.index')


@section('content')
    <div class="main_content_inner">
        @include('web.frontend.public_agencies.components.nav_link')
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m">
                <div class="section-small">
                    <div class="uk-position-relative pb-3">
                        <div class="">
                            <ul class="uk-grid">
                                @foreach($users as $user)
                                    <li style="width: 45%!important;" class="ml-lg-3 mr-lg-3 mt-0 mb-4">

                                        <div class="quiz-group-card">

                                            <!-- Group Card Thumbnail -->
                                            <div class="quiz-group-card-thumbnail">
                                                <img
                                                    src="{{$user->cover??asset('users/cover/default_agency_cover.png')}}"
                                                    style="height: 110px">
                                            </div>
                                            <!-- Group Card Content -->
                                            <div class="quiz-group-card-content mt-5">
                                                <img src="{{$user->avatar}}" style="width: 60px; height: 60px">
                                                <h3 class="text-dark mt-1">
                                                    <a class="text-dark" href="{{route('view_profile',$user->id)}}">
                                                        {{$user->name}}
                                                    </a>
                                                </h3>
                                                <p class="info">
                                                    {{$user->user_extra->bio}}
                                                </p>
{{--                                                <div class="quiz-group-card-btns">--}}
{{--                                                    <a href="#" class="button secondary small"> <i--}}
{{--                                                            class="uil-plus-circle"></i> Follow 2.3K </a>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            @include('web.frontend.public_agencies.components.side_info')

        </div>


    </div>
@endsection
