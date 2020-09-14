<header>
    <div class="header-innr">
        <!-- Logo-->
        @auth()
            <div class="header-btn-traiger" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible">
                <span></span>
            </div>
        @endauth

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
            @auth()
                <a href="#" class="opts_icon" uk-tooltip="title: Messages ; pos: bottom ;offset:7">
                    <img src="{{asset('salika/assets/images/icons/chat.svg')}}" alt="">
                    <span id="unread-messages-counter">{{auth()->user()->messages->where('seen', 0)->count()}}</span>
                </a>
                <!-- Message  notificiation dropdown -->
                <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                     class="dropdown-notifications">
                    <!-- notification contents -->
                    <div class="dropdown-notifications-content" data-simplebar>
                        <!-- notivication header -->
                        <div class="dropdown-notifications-headline">
                            <h4>Messages</h4>
                        </div>
                        <!-- notiviation list -->
                        <ul id="chat-panel">
                            <li id="user-id">
                                <a href="#">
                                <span class="notification-avatar">
                                    <img src="{{asset('salika/assets/images/avatars/avatar-3.jpg')}}" alt="">
                                </span>
                                    <div class="notification-text notification-msg-text">
                                        <strong class="text-dark" style="font-size: 16px">Stella Johnson</strong>
                                        <p class="text-dark mt-0 mb-0"> Alex will explain you how ... <span class="time-ago"> 3 h </span>
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown-notifications-footer">
                        <a href="{{route('chat/neighbourhood')}}"> See all Messages</a>
                    </div>
                </div>
            @endauth

            <!-- notificiation icon  -->
            @auth()
                <a href="#" class="opts_icon" uk-tooltip="title: Notifications ; pos: bottom ;offset:7">
                    <img src="{{asset('salika/assets/images/icons/bell.svg')}}" alt="">
                    <span id="notification-counter">
                    {{auth()->user()->unReadNotifications->count()}}
                </span>
                </a>
                <!-- notificiation dropdown -->
                <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small"
                     class="dropdown-notifications">

                    <!-- notification contents -->
                    <div class="dropdown-notifications-content" data-simplebar>

                        <!-- notivication header -->
                        <div class="dropdown-notifications-headline">
                            <h4>Notifications </h4>
                        </div>
                        <!-- notiviation list -->
                        <ul id="notification-list">
                            @foreach(auth()->user()->notifications->take(10) as $notification)
                                <li id="{{$notification->id}}"
                                    style="background-color: {{!is_null($notification->read_at)?'#f0f0f0':'white'}}">
                                    <a
                                        {{--                                    href="{{$notification->data['url']}}"--}}
                                        onclick="readNotification('{{$notification->id}}')">
                                    <span class="notification-avatar">
                                        <img src="{{$notification->data['user']['avatar']}}" alt="">
                                    </span>
                                        @if($notification->data['type']=='review-notification')
                                            <span class="notification-icon bg-gradient-warning">
                                                <i class="icon-feather-star"></i></span>
                                        @elseif($notification->data['type']=='recommendation-notification')
                                            <span class="notification-icon bg-gradient-danger">
                                                <i class="icon-feather-heart"></i></span>
                                        @endif
                                        <span class="notification-text">
                                        <strong>{{$notification->data['user']['name']}}.</strong>
                                        {{$notification->data['body']}}
                                        <br>
                                        <span class="time-ago">
                                            {{$notification->created_at->diffForHumans()}}
                                        </span>
                                    </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown-notifications-footer">
                        <a href="#"> See all Notifications</a>
                    </div>

                </div>
            @endauth


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
                            <div class="dropdown-user-name"> {{ucfirst(auth()->user()->name)}} <span>See your profile</span></div>
                        </div>

                    </a>

                    <hr class="m-0">
                    <ul class="dropdown-user-menu">
                        <li><a href="{{route('edit_profile')}}"> <i class="uil-cog"></i> Account Settings</a></li>
                        </li>
                        <li><a href="{{route('business.my_business')}}"> <i class="uil-document"></i> My Business Pages</a></li>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <i class="uil-sign-out-alt"></i>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>

    </div> <!-- / heaader-innr -->
</header>
