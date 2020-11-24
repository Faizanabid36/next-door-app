<div class="main_sidebar">
    <div class="side-overlay" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></div>

    <!-- sidebar header -->
    <div class="sidebar-header">
        <h4> Salika</h4>
        <span class="btn-close" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></span>
    </div>

    <!-- sidebar Menu -->
    <div class="sidebar">
        <div class="sidebar_innr" data-simplebar>

            <div class="sections">
                <ul>
                    <hr class="mt-90">
                    <li class="text-center">
                        <h2 class="text-dark"> {{isset(auth()->user()->id)?auth()->user()->address:''}} </h2>
                    </li>
                    <hr>
                    <li class="{{Request::is('feed/news-feed')?'active':''}}">
                        <a href="{{route('feed.','news-feed')}}">
                            <img src="{{asset('salika/assets/images/icons/home.png')}}" alt="">
                            <span> News Feed </span>
                        </a>
                    </li>
                    <li class="{{Request::is('feed/global')?'active':''}}">
                        <a href="{{route('feed.','global')}}"> <img
                                src="{{asset('salika/assets/images/icons/eye.png')}}"
                                alt="">
                            <span> Global </span>
                        </a>
                    </li>
                    <li class="{{Request::is('agency*')?'active':''}}">
                        <a href="{{route('agency.feed')}}">
                            <img src="{{asset('salika/assets/images/icons/public_agencies.png')}}">
                            <span> Public Agencies </span>
                        </a>
                    </li>
                    <li class="{{Route::currentRouteName()=='neighbours'?'active':''}}">
                        <a href="{{route('neighbours')}}"> <img
                                src="{{asset('salika/assets/images/icons/friends.png')}}"
                                alt="">
                            <span> Neighbours </span>
                        </a>
                    </li>
                    <li id="more-veiw" class="{{Request::is('event*')?'active':''}}">
                        <a href="{{route('event.index')}}"> <img
                                src="{{asset('salika/assets/images/icons/events.png')}}" alt="">
                            <span> Events </span>
                        </a>
                    </li>
                    <li class="{{Request::is('feed/lost-items')?'active':''}}">
                        <a href="{{route('feed.','lost-items')}}"> <img
                                src="{{asset('salika/assets/images/icons/lost_items.png')}}" alt="">
                            <span> Lost Items </span>
                        </a>
                    </li>
                    <li class="{{Request::is('feed/crime-awareness')?'active':''}}">
                        <a href="{{route('feed.','crime-awareness')}}"> <img
                                src="{{asset('salika/assets/images/icons/police.png')}}" alt="">
                            <span> Crime Awareness </span>
                        </a>
                    </li>
                    <li class="{{Request::is('real_estate*')?'active':''}}">
                        <a href="{{route('real_estate.listings')}}"> <img
                                src="{{asset('salika/assets/images/icons/real_estate_icon.png')}}"
                                alt="">
                            <span> Real Estate </span>
                        </a>
                    </li>
                    <li id="more-veiw" class="{{Request::is('sale-and-free*')?'active':''}}">
                        <a href="{{ route('ecommerce')}}"> <img
                                src="{{asset('salika/assets/images/icons/sale_and_free.png')}}"
                                alt="">
                            <span> Free and 4 Sale </span>
                        </a>
                    </li>

                    <li id="more-veiw" class="{{Request::is('business/list')?'active':'test'}}">
                        <a href="{{route('business.list')}}"> <img
                                src="{{asset('salika/assets/images/icons/market.png')}}" alt="">
                            <span> Business </span>
                        </a>
                    </li>
                    <li class="{{Request::is('feed/questions')?'active':'test'}}">
                        <a href="{{route('feed.','questions')}}">
                            <img src="{{asset('salika/assets/images/icons/question.png')}}" alt="">
                            <span> Questions </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
