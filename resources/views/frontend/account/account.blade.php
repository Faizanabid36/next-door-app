@extends('layouts.main')
@section('title','Edit Profile')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/file-uploaders/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('theme/app-assets/css/pages/users.css')}}">
@endsection

@section('body_content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item active"> Account Settings
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                                   href="#account-vertical-general" aria-expanded="true">
                                    <i class="feather icon-globe mr-50 font-medium-3"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                   href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock mr-50 font-medium-3"></i>
                                    Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill"
                                   href="#account-vertical-info" aria-expanded="false">
                                    <i class="feather icon-info mr-50 font-medium-3"></i>
                                    User Extras
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                    <i class="feather icon-home mr-50 font-medium-3"></i>
                                    Family and Pets
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success mb-2" role="alert">
                                            <strong>Success</strong> {{Session::get('success')}}
                                        </div>
                                    @endif

                                    @if(Session::has('errors'))
                                        <div class="alert alert-danger mb-2" role="alert">
                                            <strong>Error</strong> {{Session::get('errors')->first()}}
                                        </div>
                                    @endif
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger mb-2" role="alert">
                                            <strong>Error</strong> {{Session::get('error')}}
                                        </div>
                                    @endif
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                             aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form novalidate method="POST"
                                                  enctype='multipart/form-data'
                                                  action="{{action('UserController@updateuser',$user->id)}}">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="{{asset($user->avatar)}}"
                                                             id="avatar_picture"
                                                             class="rounded mr-75" alt="profile image" height="64"
                                                             width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label
                                                                class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                for="account-upload">Upload new photo</label>
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
                                                </div>
                                                <hr>
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-username">Username</label>
                                                                <input type="text" name="name" class="form-control"
                                                                       id="account-username" placeholder="Username"
                                                                       value="{{$user->name}}" required
                                                                       data-validation-required-message="This username field is required">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-e-mail">E-mail</label>
                                                                <input type="email" name="email" class="form-control"
                                                                       id="account-e-mail" placeholder="Email"
                                                                       value="{{$user->email}}" required
                                                                       data-validation-required-message="This email field is required">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-e-mail">Postal Code</label>
                                                                <input type="text" name="postal" class="form-control"
                                                                       id="account-postal-code"
                                                                       placeholder="Postal-code"
                                                                       value="{{$user->postal}}" required
                                                                       data-validation-required-message="This email field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-e-mail">Address</label>
                                                                <input type="text" name="address" class="form-control"
                                                                       id="account-address" placeholder="Address"
                                                                       value="{{$user->address}}" required
                                                                       data-validation-required-message="This email field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-e-mail">Contact</label>
                                                                <input type="number" name="contact" class="form-control"
                                                                       id="account-emergency-contact"
                                                                       placeholder="Contact" value="{{$user->contact}}"
                                                                       required
                                                                       data-validation-required-message="This email field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <input value="Update Profile" type="submit"
                                                               class="btn btn-primary mr-sm-1 mb-1 mb-sm-0"></input>
                                                        {{--                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>--}}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                             aria-labelledby="account-pill-password" aria-expanded="false">

                                            <form novalidate method="POST" enctype='multipart/form-data'
                                                  action="{{ action('UserController@changePassword',$user->id)}}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        @if(!is_null($user->password))
                                                            <div class="form-group">
                                                            <div class="controls">
                                                                <label for="old-password">Old Password</label>
                                                                <input type="password" required="" class="form-control"
                                                                       name="old_password"
                                                                       id="account-old-password" required
                                                                       placeholder="Old Password"
                                                                       data-validation-required-message="This old password field is required">
                                                            </div>
                                                            @endif
                                                    </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-new-password">New Password</label>
                                                                <input type="password" required=""
                                                                       name="new_password"
                                                                       id="account-new-password" class="form-control"
                                                                       placeholder="New Password" required
                                                                       data-validation-required-message="The password field is required"
                                                                       minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Retype New
                                                                    Password</label>
                                                                <input type="password" required="" name="confirm_password"
                                                                       class="form-control" required
                                                                       id="account-retype-new-password"
                                                                       data-validation-match-match="password"
                                                                       placeholder="New Password"
                                                                       data-validation-required-message="The Confirm password field is required"
                                                                       minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                             aria-labelledby="account-pill-info" aria-expanded="false">
                                            <form action="{{action('UserController@update_user_extras',$user->id)}}"
                                                  method="POST"
                                                  novalidate>
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="accountTextarea">Bio</label>
                                                            <textarea name="bio" class="form-control"
                                                                      id="accountTextarea" rows="3"
                                                                      placeholder="Your Bio data here...">{{$user->user_extra->bio}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-birth-date">Birth date</label>
                                                                <input name="birthdate" type="text"
                                                                       class="form-control birthdate-picker" required
                                                                       value="{{$user->user_extra->birthdate}}"
                                                                       placeholder="Birth date" id="account-birth-date"
                                                                       data-validation-required-message="This birthdate field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-phone">Emergency Contact</label>
                                                                <input name="emergency_contact" type="text"
                                                                       class="form-control" id="account-phone" required
                                                                       placeholder="Phone number"
                                                                       value="{{$user->user_extra->emergency_contact}}"
                                                                       data-validation-required-message="This phone number field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input name="display_phone" type="checkbox"
                                                                   class="custom-control-input"
                                                                   <?php
                                                                   if($user->user_extra->hide_phone == 0){?>
                                                                   checked
                                                                   <?php
                                                                   }
                                                                   ?>
                                                                   id="accountSwitch1">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch1"></label>
                                                            <span class="switch-label w-100">Show My Phone Number To Public</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input name="display_address" type="checkbox"
                                                                   class="custom-control-input"
                                                                   <?php
                                                                   if($user->user_extra->hide_address == 0){?>
                                                                   checked
                                                                   <?php
                                                                   }
                                                                   ?>
                                                                   id="accountSwitch2">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch2"></label>
                                                            <span
                                                                class="switch-label w-100">Show My Address To Public</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                            <form
                                                action="{{action('UserController@update_family',$user->id)}}"
                                                method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                            <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTr0H_sETw5Ki7KtS9tHJsY5z_HMZkB4BTKE0l6kBrz1R0HenZQMg&s"
                                                             id="member_picture"
                                                             class="rounded mr-75" alt="profile image" height="64"
                                                             width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label
                                                                class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                for="member-picture-upload">Upload new photo</label>
                                                            <input onchange="loadMemberPicture(event)" type="file" name="Picture"
                                                                   id="member-picture-upload"
                                                                   hidden>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                                                PNG.
                                                                Max
                                                                size of
                                                                2MB</small></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-facebook">Name</label>
                                                            <input type="text" id="account-facebook" name="member_name" class="form-control" placeholder="Family Member Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-google">Relation</label>
                                                            <input type="text" id="account-google" name="relation" class="form-control" placeholder="Define Relation">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Add Member</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @if(count($user->family_members)>0)
                                                <hr>
                                                <br>
                                                <h3>Edit Family Member/Pet</h3>
                                            @endif
                                            @foreach($user->family_members as $family_member)
                                                <div class="col-md-6 mt-5 mb-5">
                                                    <form
                                                        action="{{action('UserController@edit_family',$family_member->id)}}"
                                                        method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                    <div class="media">
                                                            <a href="javascript: void(0);">
                                                                <img src="{{asset($family_member->member_image)}}"
                                                                    id="member_picture{{$family_member->id}}"
                                                                    class="rounded mr-75" alt="profile image" height="64"
                                                                    width="64">
                                                            </a>
                                                            <div class="media-body mt-75">
                                                                <div
                                                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                    <label
                                                                        class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                        for="{{$family_member->id}}">Upload new photo</label>
                                                                    <input type="file" name="Picture"
                                                                        id="{{$family_member->id}}"
                                                                        hidden>
                                                                </div>
                                                                <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                                                        PNG.
                                                                        Max
                                                                        size of
                                                                        2MB</small></p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="account-facebook">Name</label>
                                                                    <input type="text" value="{{$family_member->member_name}}" id="account-facebook{{$family_member->id}}" name="member_name" class="form-control" placeholder="Family Member Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="account-google">Relation</label>
                                                                    <input type="text" value="{{$family_member->member_relation}}" id="account-google{{$family_member->id}}" name="relation" class="form-control" placeholder="Define Relation">
                                                                </div>
                                                            </div>
                                                            <div class="col-6 d-flex flex-sm-row flex-column justify-content-end">
                                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Update</button>
                                                            </div>
                                                            <div class="col-6 d-flex flex-sm-row flex-column justify-content-end">
                                                                <a href="{{route('delete_family',$family_member->id)}}" class="btn btn-danger mr-sm-1 mb-1 mb-sm-0">Delete</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->

        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            console.log( "ready!" );
            @foreach($user->family_members as $family_member)
                $("#{{$family_member->id}}").change(function(){
                    console.log(event.target.files[0])
                    let image = document.getElementById("member_picture{{$family_member->id}}")
                    image.src = URL.createObjectURL(event.target.files[0]);
                });
            @endforeach
        });
        let loadFile = function (event) {
            let image = document.getElementById('avatar_picture');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        let loadMemberPicture = function(event){
            let image = document.getElementById('member_picture');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection

@section('scripts')
    <script src="{{asset('theme/app-assets/js/scripts/pages/account-setting.js')}}"></script>
    <script src="{{asset('theme/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('theme/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('theme/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
@endsection
