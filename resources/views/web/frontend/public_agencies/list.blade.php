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

                                <li style="width: 45%!important;" class="ml-lg-3 mr-lg-3 mt-0 mb-4 uk-active">

                                    <div class="quiz-group-card">

                                        <!-- Group Card Thumbnail -->
                                        <div class="quiz-group-card-thumbnail">
                                            <img src="{{asset('salika/assets/images/group/group-cover-4.jpg')}}" style="height: 110px">
                                        </div>

                                        <!-- Group Card Content -->
                                        <div class="quiz-group-card-content mt-5">
                                            <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}" style="width: 60px; height: 60px">
                                            <h3 class="text-dark mt-1"> Tech World </h3>
                                            <p class="info"> Learn more about technology, insurance and
                                                education.
                                            </p>

                                            <div class="quiz-group-card-btns">
                                                <a href="#" class="button secondary small"> <i
                                                        class="uil-plus-circle"></i> Follow 2.3K </a>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                                <!-- slider 1 -->
                                <li style="width: 45%!important;" class="ml-lg-3 mr-lg-3 mt-0 mb-4">

                                    <div class="quiz-group-card">

                                        <!-- Group Card Thumbnail -->
                                        <div class="quiz-group-card-thumbnail">
                                            <img src="{{asset('salika/assets/images/group/group-cover-1.jpg')}}" alt="">
                                        </div>

                                        <!-- Group Card Content -->
                                        <div class="quiz-group-card-content">
                                            <img src="{{asset('salika/assets/images/group/group-5.jpg')}}" alt="">
                                            <h3> Investment Advice </h3>
                                            <p class="info"> Life stories from people around the world.
                                            </p>

                                            <div class="quiz-group-card-btns">
                                                <a href="#" class="button secondary small">
                                                    <i class="uil-plus-circle"></i> View Page </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <!-- slider 3 -->
                                <li style="width: 45%!important;" class="ml-lg-3 mr-lg-3 mt-0 mb-4">

                                    <div class="quiz-group-card">

                                        <!-- Group Card Thumbnail -->
                                        <div class="quiz-group-card-thumbnail">
                                            <img src="{{asset('salika/assets/images/group/group-cover-3.jpg')}}" alt="">
                                        </div>

                                        <!-- Group Card Content -->
                                        <div class="quiz-group-card-content">
                                            <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}" alt="">
                                            <h3> Essay Writings </h3>
                                            <p class="info"> Lots of essay for kids and school students.
                                            </p>

                                            <div class="quiz-group-card-btns">
                                                <a href="#" class="button secondary small"> <i
                                                        class="uil-plus-circle"></i> Follow 3.1K </a>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            @include('web.frontend.public_agencies.components.side_info')

        </div>


    </div>
@endsection
