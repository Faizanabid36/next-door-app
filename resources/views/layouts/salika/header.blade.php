<header>
    <div class="header-innr">
        <!-- Logo-->
        <div class="header-btn-traiger" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible">
            <span></span></div>

        <!-- Logo-->
        <div id="logo">
            {{--                    <a href="homepage.html"> <img src="{{asset('salika/assets/images/logo.png')}}" alt=""></a>--}}
{{--            <h2 class="mt-3">Salika</h2>--}}
            <a href="{{route('dashboard')}}"> <img src="{{asset('salika/assets/images/salika_logo.png')}}" class="" style="width: 60px" alt=""></a>
        </div>

        <!-- form search-->
        <div class="head_search">
            <form>
                <div class="head_search_cont">
                    <input value="" type="text" class="form-control"
                           placeholder="Search for Friends , Videos and more.." autocomplete="off">
                    <i class="s_icon uil-search-alt"></i>
                </div>

                <!-- Search box dropdown -->
                <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small"
                     class="dropdown-search">
                    <!-- User menu -->

                    <ul class="dropdown-search-list">
                        <li class="list-title"> Recent Searches</li>
                        <li><a href="#"> <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}"
                                              alt=""> Erica Jones
                            </a></li>
                        <li><a href="#"> <img src="{{asset('salika/assets/images/group/group-2.jpg')}}" alt="">
                                Coffee
                                Addicts</a></li>
                        <li><a href="#"> <img src="{{asset('salika/assets/images/group/group-4.jpg')}}" alt="">
                                Mountain Riders
                            </a></li>
                        <li><a href="#"> <img src="{{asset('salika/assets/images/group/group-5.jpg')}}" alt="">
                                Property Rent
                                And Sale </a></li>
                        <li class="menu-divider"></li>
                        <li class="list-footer"><a href="your-history.html"> Searches History </a>
                        </li>
                    </ul>

                </div>


            </form>
        </div>

        <!-- user icons -->
        <div class="head_user">
            <!-- Message  notificiation dropdown -->
            <a href="#" class="opts_icon" uk-tooltip="title: Messages ; pos: bottom ;offset:7">
                <img src="{{asset('salika/assets/images/icons/chat.svg')}}" alt=""> <span>4</span>
            </a>

            <!-- Message  notificiation dropdown -->
            <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                 class="dropdown-notifications">

                <!-- notification contents -->
                <div class="dropdown-notifications-content" data-simplebar>

                    <!-- notivication header -->
                    <div class="dropdown-notifications-headline">
                        <h4>Messages</h4>
{{--                        <a href="#">--}}
{{--                            <i class="icon-feather-settings"--}}
{{--                               uk-tooltip="title: Message settings ; pos: left"></i>--}}
{{--                        </a>--}}

{{--                        <input type="text" class="uk-input" placeholder="Search in Messages">--}}
                    </div>

                    <!-- notiviation list -->
                    <ul>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar status-online">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Jonathan Madano</strong>
                                    <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span></p>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-3.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Stella Johnson</strong>
                                    <p> Alex will explain you how ... <span class="time-ago"> 3 h </span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar status-online">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-1.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Alex Dolgove</strong>
                                    <p> Alia just joined Messenger! <span class="time-ago"> 3 h </span></p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar status-online">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-4.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Adrian Mohani</strong>
                                    <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span></p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Jonathan Madano</strong>
                                    <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span></p>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-3.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Stella Johnson</strong>
                                    <p> Alex will explain you how ... <span class="time-ago"> 3 h </span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-1.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Alex Dolgove</strong>
                                    <p> Alia just joined Messenger! <span class="time-ago"> 3 h </span></p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-4.jpg')}}"
                                                     alt="">
                                            </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Adrian Mohani</strong>
                                    <p>Thanks for The Answer ... <span class="time-ago"> 2 h </span></p>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="dropdown-notifications-footer">
                    <a href="#"> See all in Messages</a>
                </div>
            </div>

            <!-- notificiation icon  -->
            <a href="#" class="opts_icon" uk-tooltip="title: Notifications ; pos: bottom ;offset:7">
                <img src="{{asset('salika/assets/images/icons/bell.svg')}}" alt=""> <span>3</span>
            </a>


            <!-- notificiation dropdown -->
            <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                 class="dropdown-notifications">

                <!-- notification contents -->
                <div class="dropdown-notifications-content" data-simplebar>

                    <!-- notivication header -->
                    <div class="dropdown-notifications-headline">
                        <h4>Notifications </h4>
{{--                        <a href="#">--}}
{{--                            <i class="icon-feather-settings"--}}
{{--                               uk-tooltip="title: Notifications settings ; pos: left"></i>--}}
{{--                        </a>--}}
                    </div>

                    <!-- notiviation list -->
                    <ul>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}"
                                                     alt="">
                                            </span>
                                <span class="notification-icon bg-gradient-primary">
                                                <i class="icon-feather-thumbs-up"></i></span>
                                <span class="notification-text">
                                                <strong>Adrian Moh.</strong> Like Your Comment On Video
                                                <span class="text-primary">Learn Prototype Faster</span>
                                                <br> <span class="time-ago"> 9 hours ago </span>
                                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-3.jpg')}}"
                                                     alt="">
                                            </span>
                                <span class="notification-icon bg-gradient-danger">
                                                <i class="icon-feather-star"></i></span>
                                <span class="notification-text">
                                                <strong>Alex Dolgove</strong> Added New Review In Video
                                                <span class="text-primary">Full Stack PHP Developer</span>
                                                <br> <span class="time-ago"> 19 hours ago </span>
                                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-4.jpg')}}"
                                                     alt="">
                                            </span>
                                <span class="notification-icon bg-gradient-success">
                                                <i class="icon-feather-message-circle"></i></span>
                                <span class="notification-text">
                                                <strong>Stella John</strong> Replay Your Comment in
                                                <span class="text-primary">Adobe XD Tutorial</span>
                                                <br> <span class="time-ago"> 12 hours ago </span>
                                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}"
                                                     alt="">
                                            </span>
                                <span class="notification-icon bg-gradient-primary">
                                                <i class="icon-feather-thumbs-up"></i></span>
                                <span class="notification-text">
                                                <strong>Adrian Moh.</strong> Like Your Comment On Video
                                                <span class="text-primary">Learn Prototype Faster</span>
                                                <br> <span class="time-ago"> 9 hours ago </span>
                                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-3.jpg')}}"
                                                     alt="">
                                            </span>
                                <span class="notification-icon bg-gradient-warning">
                                                <i class="icon-feather-star"></i></span>
                                <span class="notification-text">
                                                <strong>Alex Dolgove</strong> Added New Review In Video
                                                <span class="text-primary">Full Stack PHP Developer</span>
                                                <br> <span class="time-ago"> 19 hours ago </span>
                                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                            <span class="notification-avatar">
                                                <img src="{{asset('salika/assets/images/avatars/avatar-4.jpg')}}"
                                                     alt="">
                                            </span>
                                <span class="notification-icon bg-gradient-success">
                                                <i class="icon-feather-message-circle"></i></span>
                                <span class="notification-text">
                                                <strong>Stella John</strong> Replay Your Comment in
                                                <span class="text-primary">Adobe XD Tutorial</span>
                                                <br> <span class="time-ago"> 12 hours ago </span>
                                            </span>
                            </a>
                        </li>
                    </ul>

                </div>


            </div>


            <!-- profile -image -->
            @if(isset(auth()->user()->id))
                <a class="opts_account" href="#"> <img src="{{auth()->user()->avatar}}"
                                                       alt=""></a>

                <!-- profile dropdown-->
                <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                     class="dropdown-notifications rounded">

                    <!-- User Name / Avatar -->
                    <a href="{{route('view_profile',auth()->user()->id)}}">

                        <div class="dropdown-user-details">
                            <div class="dropdown-user-avatar">
                                <img src="{{auth()->user()->avatar}}" alt="">
                            </div>
                            <div class="dropdown-user-name"> {{auth()->user()->name}} <span>See your profile</span></div>
                        </div>

                    </a>

                    <hr class="m-0">
                    <ul class="dropdown-user-menu">
                        {{--                    <li><a href="page-setting.html"> <i class="uil-user"></i> My Account </a></li>--}}
                        <li><a href="{{route('edit_profile')}}"> <i class="uil-cog"></i> Account Settings</a></li>
                        </li>
                        <li><a href="form-login.html"> <i class="uil-sign-out-alt"></i>Log Out</a>
                        </li>
                    </ul>
                </div>
            @endif



        </div>

    </div> <!-- / heaader-innr -->
</header>
