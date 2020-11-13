@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner pt-0">
        <div class="profile">
            <div class="profile-cover">
                <!-- profile cover -->
                <img src="{{$user->cover??asset('users/cover/default_agency_cover.png')}}" alt="">
            </div>
            <div class="profile-details">
                <div class="profile-image">
                    <img src="{{$user->avatar}}" alt="">
                </div>
                <div class="profile-details-info">
                    <h1 class="text-dark"> {{$user->name}} </h1>
                    <p class="text-dark"> {{$user->user_extra->bio}}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="section-small">
            <div class="uk-grid">
                <div class="uk-width-2-3@m fead-area" id="feed-area">
                    <div id="laoding-data"><h2 class="text-dark text-center">
                            Please Wait, while the data is being loaded...!
                        </h2>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="uk-width-expand ml-lg-2">
                    <h3 class="text-dark"><i>About</i></h3>
                    @if(!$user->user_extra->hide_address)
                        <div class="list-group-items" style="font-style: italic">
                            <i class="uil-home-alt"></i>
                            <h5> Community <span> {{$user->address??'Unavailable'}} </span></h5>
                        </div>
                    @endif

                    @if(!$user->user_extra->hide_phone)
                        <div class="list-group-items" style="font-style: italic">
                            <i class="uil-phone-volume"></i>
                            <h5> Contact <span> {{$user->contact??'Unavailable'}} </span></h5>
                        </div>
                    @endif

                    <div class="list-group-items" style="font-style: italic">
                        <i class="uil-phone-times"></i>
                        <h5> Emergency Phone <span> {{$user->user_extra->emergency_contact??'Unavailable'}} </span>
                        </h5>
                    </div>
                    @if(!is_null($user->user_extra->birthdate))
                        <div class="list-group-items" style="font-style: italic">
                            <i class="icon-line-awesome-birthday-cake"></i>
                            <h5> DOB <span> {{($user->user_extra->birthdate)}} </span></h5>
                        </div>
                    @endif


                    @if(auth()->user()->id==$user->id)
                        <a href="{{route('edit_profile')}}" class="button soft-primary block my-3">
                            <span class="icon-feather-edit"></span>
                            Edit Profile
                        </a>
                    @endif

                    <hr class="mt-3 mb-0">
                </div>

            </div>

        </div>

    </div>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function () {
            let page = 1;
            load_more(page)
            $(window).scroll(function () { //detect page scroll
                if ($(window).scrollTop() + $(window).height() + 2 >= $(document).height()) {
                    page++;
                    load_more(page);
                }
            });
        })
    </script>
@endsection
