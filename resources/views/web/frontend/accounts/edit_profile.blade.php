@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner p-sm-0 ml-sm-4">

        <h1 class="text-dark"> Account Settings </h1>

        <div class="uk-position-relative" uk-grid>
            <div class="uk-width-1-4@m uk-flex-last@m pl-sm-0">

                <nav class="responsive-tab style-3 setting-menu"
                     uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top">
                    <ul>
                        <li class="uk-active"><a href="#"> <i class="uil-cog"></i> General </a></li>
                        <li><a href="{{route('change-password')}}"> <i class="uil-unlock-alt"></i> Password </a></li>
                        <li><a href="{{route('user-extras')}}"> <i class="uil-info-circle"></i> User Extras</a></li>
                    </ul>
                </nav>

            </div>

            <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0 text-dark"> Update Profile info </h5>
                    </div>
                    <hr class="m-0">
                    @include('web.frontend.accounts.components.session_messages')
                    <form class="p-4" novalidate method="POST"
                          enctype='multipart/form-data'
                          action="{{action('UserController@updateuser',$user->id)}}">
                        @csrf
                        <div class="mb-5 media-upload-image">
                            <a href="javascript: void(0);">
                                <img src="{{$user->cover??asset('users/cover/default_agency_cover.png')}}"
                                     id="display_cover_picture"
                                     class="rounded mr-75" alt="profile image" height="64"
                                     width="125">
                            </a>
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
                                        5MB</small></p>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-5 media-upload-image">
                            <a href="javascript: void(0);">
                                <img src="{{asset($user->avatar)}}"
                                     id="avatar_picture"
                                     class="rounded mr-75" alt="profile image" height="64"
                                     width="80">
                            </a>
                            <div class="media-body">
                                <div
                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                    <label
                                        class="btn btn-sm small button primary cursor-pointer ml-50 mb-50 mb-sm-0 text-white"
                                        for="account-upload">
                                        Upload new photo
                                    </label>
                                    <input onchange="loadFile(event)" type="file" name="Picture"
                                           id="account-upload"
                                           hidden>
                                </div>
                                <p class="ml-75 mt-50 text-dark"><small>Allowed JPG, GIF or
                                        PNG.
                                        Max
                                        size of
                                        2MB</small></p>
                            </div>
                            <hr class="mt-2">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Username </h5>
                            <input value="{{$user->name}}" type="text" name="name" class="uk-input text-dark" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Email Address </h5>
                            <input value="{{$user->email}}" type="email" name="email" class="uk-input text-dark" placeholder="Email Address">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Contact </h5>
                            <input value="{{$user->contact}}" type="text" name="contact" class="uk-input text-dark" placeholder="Contact Number">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Postal Code </h5>
                            <input value="{{$user->postal}}" type="text" name="postal" class="uk-input text-dark" placeholder="Postal Code">
                        </div>
                        <div class="mb-1">
                            <h5 class="uk-text-bold mb-2 text-dark"> Address </h5>
                            <input value="{{$user->address}}" type="text" readonly style="background-color: #f5f5f1;" name="address" class="uk-input text-dark" placeholder="Address">
                        </div>
                        <br>
                        <br>
                        <div class="uk-flex">
                            <button class="button primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        {{--$( document ).ready(function() {--}}
        {{--    console.log( "ready!" );--}}
        {{--    @foreach($user->family_members as $family_member)--}}
        {{--    $("#{{$family_member->id}}").change(function(){--}}
        {{--        console.log(event.target.files[0])--}}
        {{--        let image = document.getElementById("member_picture{{$family_member->id}}")--}}
        {{--        image.src = URL.createObjectURL(event.target.files[0]);--}}
        {{--    });--}}
        {{--    @endforeach--}}
        {{--});--}}
        let loadFile = function (event) {
            let image = document.getElementById('avatar_picture');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        let loadCover = function (event) {
            let image = document.getElementById('display_cover_picture');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
