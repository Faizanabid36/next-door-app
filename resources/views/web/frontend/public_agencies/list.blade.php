@extends('layouts.salika.index')


@section('content')
    <div class="main_content_inner">
        @include('web.frontend.public_agencies.components.nav_link')
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m">

                {{--                <div class="uk-child-width-1-2@s uk-grid-row-small" uk-grid>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-4.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Mountain Riders </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Beach , Hotels </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-2.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Coffee Addicts </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Drinks , Food </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-3.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Graphic Design </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Photoshop , Prototype </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-5.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Property Rent And Sale </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Drinks , Food </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-1.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Architecture </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Sketch , 3D Max </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-4.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Mountain Riders </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Beach , Hotels </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-2.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Coffee Addicts </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Drinks , Food </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-3.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Graphic Design </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Photoshop , Prototype </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-5.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Property Rent And Sale </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Drinks , Food </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-1.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Architecture </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Sketch , 3D Max </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-4.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Mountain Riders </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Beach , Hotels </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-2.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Coffee Addicts </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Drinks , Food </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-3.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Graphic Design </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Photoshop , Prototype </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-5.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Property Rent And Sale </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Drinks , Food </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-1.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Architecture </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Sketch , 3D Max </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-4.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Mountain Riders </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Beach , Hotels </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-2.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Coffee Addicts </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Drinks , Food </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        <div class="list-items">--}}
                {{--                            <div class="list-item-media">--}}
                {{--                                <img src="assets/images/group/group-3.jpg" alt="">--}}
                {{--                            </div>--}}
                {{--                            <div class="list-item-content">--}}
                {{--                                <a href="group-feed.html">--}}
                {{--                                    <h5> Graphic Design </h5>--}}
                {{--                                </a>--}}
                {{--                                <p> Photoshop , Prototype </p>--}}
                {{--                            </div>--}}
                {{--                            <div class="uk-width-auto">--}}
                {{--                                        <span class="btn-option" aria-expanded="false">--}}
                {{--                                            <i class="icon-feather-more-horizontal"></i>--}}
                {{--                                        </span>--}}
                {{--                                <div class="dropdown-option-nav uk-dropdown"--}}
                {{--                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">--}}
                {{--                                    <ul>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bell"></i> Joined </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <span> <i class="uil-bookmark"></i> Add Bookmark </span>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                                    <span> <i class="uil-share-alt"></i> Share Your Friends--}}
                {{--                                                    </span>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                {{--                <div class="uk-flex uk-flex-center my-4">--}}
                {{--                    <a href="#" class="button secondary small px-11 circle"> Veiw more </a>--}}
                {{--                </div>--}}

                <div class="section-small">
                    <div class="uk-position-relative pb-3">
                        <div class="">
                            <ul class="uk-grid">

                                <li style="width: 45%!important;" class="ml-lg-3 mr-lg-3 mt-0 mb-4 uk-active">

                                    <div class="quiz-group-card">

                                        <!-- Group Card Thumbnail -->
                                        <div class="quiz-group-card-thumbnail">
                                            <img src="{{asset('salika/assets/images/group/group-cover-4.jpg')}}" style="height: 110px">
                                        </div>

                                        <!-- Group Card Content -->
                                        <div class="quiz-group-card-content mt-5">
                                            <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}" style="width: 60px; height: 60px">
                                            <h3 class="text-dark mt-1"> Tech World </h3>
                                            <p class="info"> Learn more about technology, insurance and
                                                education.
                                            </p>

                                            <div class="quiz-group-card-btns">
                                                <a href="#" class="button secondary small"> <i
                                                        class="uil-plus-circle"></i> Follow 2.3K </a>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                                <!-- slider 1 -->
                                <li style="width: 45%!important;" class="ml-lg-3 mr-lg-3 mt-0 mb-4">

                                    <div class="quiz-group-card">

                                        <!-- Group Card Thumbnail -->
                                        <div class="quiz-group-card-thumbnail">
                                            <img src="{{asset('salika/assets/images/group/group-cover-1.jpg')}}" alt="">
                                        </div>

                                        <!-- Group Card Content -->
                                        <div class="quiz-group-card-content">
                                            <img src="{{asset('salika/assets/images/group/group-5.jpg')}}" alt="">
                                            <h3> Investment Advice </h3>
                                            <p class="info"> Life stories from people around the world.
                                            </p>

                                            <div class="quiz-group-card-btns">
                                                <a href="#" class="button secondary small">
                                                    <i class="uil-plus-circle"></i> View Page </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                <!-- slider 3 -->
                                <li style="width: 45%!important;" class="ml-lg-3 mr-lg-3 mt-0 mb-4">

                                    <div class="quiz-group-card">

                                        <!-- Group Card Thumbnail -->
                                        <div class="quiz-group-card-thumbnail">
                                            <img src="{{asset('salika/assets/images/group/group-cover-3.jpg')}}" alt="">
                                        </div>

                                        <!-- Group Card Content -->
                                        <div class="quiz-group-card-content">
                                            <img src="{{asset('salika/assets/images/avatars/avatar-2.jpg')}}" alt="">
                                            <h3> Essay Writings </h3>
                                            <p class="info"> Lots of essay for kids and school students.
                                            </p>

                                            <div class="quiz-group-card-btns">
                                                <a href="#" class="button secondary small"> <i
                                                        class="uil-plus-circle"></i> Follow 3.1K </a>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            @include('web.frontend.public_agencies.components.side_info')

        </div>


    </div>
@endsection
