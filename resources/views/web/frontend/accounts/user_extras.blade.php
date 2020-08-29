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
                        <li><a href="{{route('change-password')}}"> <i class="uil-unlock-alt"></i> Password </a></li>
                        <li class="uk-active"><a href="{{route('user-extras')}}"> <i class="uil-info-circle"></i> User Extras</a></li>
{{--                        <li><a href="#"> <i class="uil-trash-alt"></i> Delete account</a></li>--}}
                    </ul>
                </nav>

            </div>

            <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0 text-dark"> Change Password </h5>
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
                          action="{{action('UserController@update_user_extras',$user->id)}}">
                        @csrf
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Enter Bio </h5>
                            <textarea name="bio" class="uk-textarea text-dark" rows="5" placeholder="Tell people more about you...">{{$user->user_extra->bio}}</textarea>
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Emergency Contact </h5>
                            <input value="{{$user->user_extra->emergency_contact}}" type="text" name="emergency_contact" class="uk-input text-dark" placeholder="Emergency Contact">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Birth Date </h5>
                            <input value="{{$user->user_extra->birthdate}}" type="date" name="birthdate" class="uk-input text-dark" placeholder="Birth Date">
                        </div>
                        <div class="mb-3">
                            <h5 class="text-dark">
                                <input name="display_phone" class="uk-checkbox" type="checkbox"
                                       <?php
                                       if($user->user_extra->hide_phone == 0){?>
                                       checked
                                        <?php
                                        }
                                        ?>
                                >
                                Show My Phone Number To Public
                            </h5>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-dark">
                                <input name="display_address" class="uk-checkbox text-dark" type="checkbox"
{{--                                       {{dd($user->user_extra)}}--}}
                                       <?php
                                       if($user->user_extra->hide_address == 0){?>
                                       checked
                                        <?php
                                            }
                                        ?>
                                >
                                Show My Address To Public
                            </h5>
                        </div>
                        <br>
                        <div class="uk-flex">
                            <button class="button primary">Update Settings</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
