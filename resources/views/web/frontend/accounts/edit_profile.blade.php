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
{{--                        <li><a href="#"> <i class="uil-user"></i> Profile </a></li>--}}
{{--                        <li><a href="#"> <i class="uil-usd-circle"></i> Monetization</a></li>--}}
                        <li><a href="{{route('change-password')}}"> <i class="uil-unlock-alt"></i> Password </a></li>
                        <li><a href="{{route('user-extras')}}"> <i class="uil-info-circle"></i> User Extras</a></li>
{{--                        <li><a href="#"> <i class="uil-scenery"></i> Avatar & Cover</a></li>--}}
{{--                        <li><a href="#"> <i class="uil-shield-check"></i> Security</a></li>--}}
{{--                        <li><a href="#"> <i class="uil-bolt"></i> Membarship</a></li>--}}
{{--                        <li><a href="#"> <i class="uil-history"></i> Manage Sessions</a></li>--}}
{{--                        <li><a href="#"> <i class="uil-trash-alt"></i> Delete account</a></li>--}}
                    </ul>
                </nav>

            </div>

            <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0"> Update Profile info </h5>
                    </div>
                    <hr class="m-0">
                    @if(Session::has('success'))
                        <div class="bg-gradient-success shadow-success uk-light text-white" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <strong>Success:</strong> {{Session::get('success')}}
                        </div>
                    @endif

                    @if(Session::has('errors'))
                        <div class="bg-gradient-danger shadow-danger uk-light text-white" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <strong>Error:</strong> {{Session::get('errors')->first()}}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="bg-gradient-danger shadow-danger uk-light text-white" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <strong>Error:</strong> {{Session::get('error')}}
                        </div>
                    @endif
                    <form class=" p-4" novalidate method="POST"
                          enctype='multipart/form-data'
                          action="{{action('UserController@updateuser',$user->id)}}">
                        @csrf
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
                                <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                        PNG.
                                        Max
                                        size of
                                        2MB</small></p>
                            </div>
                            <hr class="mt-2">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2"> Username </h5>
                            <input value="{{$user->name}}" type="text" name="name" class="uk-input" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2"> Email Address </h5>
                            <input value="{{$user->email}}" type="email" name="email" class="uk-input" placeholder="Email Address">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2"> Contact </h5>
                            <input value="{{$user->contact}}" type="text" name="contact" class="uk-input" placeholder="Contact Number">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2"> Postal Code </h5>
                            <input value="{{$user->postal}}" type="text" name="postal" class="uk-input" placeholder="Postal Code">
                        </div>
                        <div class="mb-1">
                            <h5 class="uk-text-bold mb-2"> Address </h5>
                            <input value="{{$user->address}}" type="text" readonly style="background-color: #f5f5f1;" name="address" class="uk-input" placeholder="Address">
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
        // let loadMemberPicture = function(event){
        //     let image = document.getElementById('member_picture');
        //     image.src = URL.createObjectURL(event.target.files[0]);
        // }
    </script>
@endsection
