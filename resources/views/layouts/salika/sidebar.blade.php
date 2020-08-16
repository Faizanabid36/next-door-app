<div class="main_sidebar">
    <div class="side-overlay" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></div>

    <!-- sidebar header -->
    <div class="sidebar-header">
        <h4> Navigation</h4>
        <span class="btn-close" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></span>
    </div>

    <!-- sidebar Menu -->
    <div class="sidebar">
        <div class="sidebar_innr" data-simplebar>

            <div class="sections">
                <ul>
                    <hr class="mt-90">
                    <li class="text-center">
                        <h2 class="text-dark"> {{auth()->user()->address}} </h2>
                    </li>
                    <hr>
                    <li>
                        <a href="homepage.html"> <img src="{{asset('salika/assets/images/icons/home.png')}}" alt="">
                            <span> News Feed </span>
                        </a>
                    </li>
                    <li>
                        <a href="homepage.html"> <img src="{{asset('salika/assets/images/icons/public_agencies.png')}}" alt="">
                            <span> Public Agencies </span>
                        </a>
                    </li>
                    <li id="more-veiw">
                        <a href="friends.html"> <img src="{{asset('salika/assets/images/icons/friends.png')}}"
                                                     alt="">
                            <span> Neighbours </span>
                        </a>
                    </li>
                    <li id="more-veiw">
                        <a href="event.html"> <img src="{{asset('salika/assets/images/icons/events.png')}}" alt="">
                            <span> Events </span>
                        </a>
                    </li>
                    <li id="more-veiw">
                        <a href="event.html"> <img src="{{asset('salika/assets/images/icons/lost_items.png')}}" alt="">
                            <span> Lost Items </span>
                        </a>
                    </li>
                    <li id="more-veiw">
                        <a href="event.html"> <img src="{{asset('salika/assets/images/icons/crime_safety.png')}}" alt="">
                            <span> Crime and Safety </span>
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="chats.html"> <img src="{{asset('salika/assets/images/icons/chat.png')}}" alt="">--}}
{{--                            <span> Chats </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="pages.html"> <img src="{{asset('salika/assets/images/icons/flag.png')}}" alt="">--}}
{{--                            <span> Pages </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="videos.html"> <img src="{{asset('salika/assets/images/icons/video.png')}}" alt="">--}}
{{--                            <span> Videos </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="active">--}}
{{--                        <a href="groups.html"> <img src="{{asset('salika/assets/images/icons/group.png')}}" alt="">--}}
{{--                            <span> Groups </span> </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="courses.html"> <img src="{{asset('salika/assets/images/icons/pen.png')}}" alt="">--}}
{{--                            <span> Courses </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>
                        <a href="jobs.html"> <img src="{{asset('salika/assets/images/icons/bag.png')}}" alt="">
                            <span> Real Estate </span>
                        </a>
                    </li>
                    <li id="more-veiw">
                        <a href="{{ route('ecommerce')}}"> <img src="{{asset('salika/assets/images/icons/market.png')}}"
                                                         alt="">
                            <span> Sale and Free </span>
                        </a>
                    </li>

{{--                    <li id="more-veiw">--}}
{{--                        <a href="book.html"> <img src="{{asset('salika/assets/images/icons/book.png')}}" alt="">--}}
{{--                            <span> Books </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li id="more-veiw">
                        <a href="blog.html"> <img src="{{asset('salika/assets/images/icons/document.png')}}" alt="">
                            <span> Documents </span>
                        </a>
                    </li>
                    <li>
                        <a href="questions.html"> <img src="{{asset('salika/assets/images/icons/info.png')}}"
                                                       alt="">
                            <span> Questions </span>
                        </a>
                    </li>
                    <li id="more-veiw">
                        <a href="gallery.html"> <img src="{{asset('salika/assets/images/icons/photo.png')}}" alt="">
                            <span> Gallery </span>
                        </a>
                    </li>

{{--                    <li id="more-veiw">--}}
{{--                        <a href="movies.html"> <img src="{{asset('salika/assets/images/icons/movies.png')}}" alt="">--}}
{{--                            <span> Movies </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li id="more-veiw">--}}
{{--                        <a href="games.html"> <img src="{{asset('salika/assets/images/icons/game.png')}}" alt="">--}}
{{--                            <span> Games </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>

    </div>
</div>