@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner p-sm-0 ml-sm-4">

        <h1 class="text-dark"> Account Settings </h1>

        <div class="uk-position-relative" uk-grid>
            <div class="uk-width-1-4@m uk-flex-last@m pl-sm-0">

                <nav class="responsive-tab style-3 setting-menu"
                     uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top">
                    <ul>
                        <li><a href="{{route('edit_profile')}}"> <i class="uil-cog"></i> General </a></li>
                        <li class="uk-active"><a href="{{route('change-password')}}"> <i class="uil-unlock-alt"></i>
                                Password </a></li>
                        <li><a href="{{route('user-extras')}}"> <i class="uil-info-circle"></i> User Extras</a></li>
                    </ul>
                </nav>

            </div>

            <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0 text-dark"> Change Password </h5>
                    </div>
                    <hr class="m-0">
                    @include('web.frontend.accounts.components.session_messages')
                    <form class=" p-4" novalidate method="POST"
                          enctype='multipart/form-data'
                          action="{{ action('UserController@changePassword',$user->id)}}">
                        @csrf
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Old Password </h5>
                            <input required type="password" name="old_password" class="uk-input uk-form-small text-dark"
                                   placeholder="Old Password">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> New Password </h5>
                            <input required type="password" name="new_password" class="uk-input uk-form-small text-dark"
                                   placeholder="New Password">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Retype New Password </h5>
                            <input required type="password" name="confirm_password" class="uk-input uk-form-small text-dark"
                                   placeholder="Confirm Password">
                        </div>
                        <br>
                        <div class="uk-flex">
                            <button class="button primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
