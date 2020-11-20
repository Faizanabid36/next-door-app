@extends('layouts.main')
@section('title','Public Agencies')
@section('body_content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Profile</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('agents_list')}}">Public Agents</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a
                                    class="dropdown-item" href="#">Email</a><a class="dropdown-item"
                                                                               href="#">Calendar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <section id="profile-info">
                        <div class="row">
                            <div class="col-lg-8 col-12">
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="d-flex justify-content-start align-items-center mb-1">--}}
{{--                                            <div class="avatar mr-1">--}}
{{--                                                <img src="../../../app-assets/images/profile/user-uploads/user-01.jpg"--}}
{{--                                                     alt="avtar img holder" height="45" width="45">--}}
{{--                                            </div>--}}
{{--                                            <div class="user-page-info">--}}
{{--                                                <p class="mb-0">Leeanna Alvord</p>--}}
{{--                                                <span class="font-small-2">12 Dec 2018 at 1:16 AM</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="ml-auto user-like text-danger"><i class="fa fa-heart"></i></div>--}}
{{--                                        </div>--}}
{{--                                        <p>I love jujubes wafer pie ice cream tiramisu. Chocolate I love pastry pastry--}}
{{--                                            sesame snaps wafer. Pastry topping biscuit lollipop topping I love lemon--}}
{{--                                            drops--}}
{{--                                            sweet roll bonbon. Brownie donut icing.</p>--}}
{{--                                        <img class="img-fluid card-img-top rounded-sm mb-2"--}}
{{--                                             src="../../../app-assets/images/profile/post-media/2.jpg"--}}
{{--                                             alt="avtar img holder">--}}
{{--                                        <div class="d-flex justify-content-start align-items-center mb-1">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="feather icon-heart font-medium-2 mr-50"></i>--}}
{{--                                                <span>145</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="ml-2">--}}
{{--                                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">--}}
{{--                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"--}}
{{--                                                        data-placement="bottom" data-original-title="Trina Lynes"--}}
{{--                                                        class="avatar pull-up">--}}
{{--                                                        <img class="media-object rounded-circle"--}}
{{--                                                             src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"--}}
{{--                                                             alt="Avatar" height="30" width="30">--}}
{{--                                                    </li>--}}
{{--                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"--}}
{{--                                                        data-placement="bottom" data-original-title="Lilian Nenez"--}}
{{--                                                        class="avatar pull-up">--}}
{{--                                                        <img class="media-object rounded-circle"--}}
{{--                                                             src="../../../app-assets/images/portrait/small/avatar-s-2.jpg"--}}
{{--                                                             alt="Avatar" height="30" width="30">--}}
{{--                                                    </li>--}}
{{--                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"--}}
{{--                                                        data-placement="bottom" data-original-title="Alberto Glotzbach"--}}
{{--                                                        class="avatar pull-up">--}}
{{--                                                        <img class="media-object rounded-circle"--}}
{{--                                                             src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"--}}
{{--                                                             alt="Avatar" height="30" width="30">--}}
{{--                                                    </li>--}}
{{--                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"--}}
{{--                                                        data-placement="bottom" data-original-title="George Nordic"--}}
{{--                                                        class="avatar pull-up">--}}
{{--                                                        <img class="media-object rounded-circle"--}}
{{--                                                             src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"--}}
{{--                                                             alt="Avatar" height="30" width="30">--}}
{{--                                                    </li>--}}
{{--                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"--}}
{{--                                                        data-placement="bottom" data-original-title="Vinnie Mostowy"--}}
{{--                                                        class="avatar pull-up">--}}
{{--                                                        <img class="media-object rounded-circle"--}}
{{--                                                             src="../../../app-assets/images/portrait/small/avatar-s-4.jpg"--}}
{{--                                                             alt="Avatar" height="30" width="30">--}}
{{--                                                    </li>--}}
{{--                                                    <li class="d-inline-block pl-50">--}}
{{--                                                        <span>+140 more</span>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                            <p class="ml-auto d-flex align-items-center">--}}
{{--                                                <i class="feather icon-message-square font-medium-2 mr-50"></i>77--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-start align-items-center mb-1">--}}
{{--                                            <div class="avatar mr-50">--}}
{{--                                                <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"--}}
{{--                                                     alt="Avatar" height="30" width="30">--}}
{{--                                            </div>--}}
{{--                                            <div class="user-page-info">--}}
{{--                                                <h6 class="mb-0">Kitty Allanson</h6>--}}
{{--                                                <span class="font-small-2">orthoplumbate morningtide naphthaline exarteritis</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="ml-auto cursor-pointer">--}}
{{--                                                <i class="feather icon-heart mr-50"></i>--}}
{{--                                                <i class="feather icon-message-square"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-start align-items-center mb-2">--}}
{{--                                            <div class="avatar mr-50">--}}
{{--                                                <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg"--}}
{{--                                                     alt="Avatar" height="30" width="30">--}}
{{--                                            </div>--}}
{{--                                            <div class="user-page-info">--}}
{{--                                                <h6 class="mb-0">Jeanie Bulgrin</h6>--}}
{{--                                                <span--}}
{{--                                                    class="font-small-2">blockiness pandemy metaxylene speckle coppy</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="ml-auto cursor-pointer">--}}
{{--                                                <i class="feather icon-heart mr-50"></i>--}}
{{--                                                <i class="feather icon-message-square"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <fieldset class="form-label-group mb-50">--}}
{{--                                        <textarea class="form-control" id="label-textarea" rows="3"--}}
{{--                                                  placeholder="Add Comment"></textarea>--}}
{{--                                            <label for="label-textarea">Add Comment</label>--}}
{{--                                        </fieldset>--}}
{{--                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="{{asset('theme/app-assets/images/profile/user-uploads/user-01.jpg')}}"
                                                     alt="avtar img holder" height="45" width="45">
                                            </div>
                                            <div class="user-page-info">
                                                <h6 class="mb-0"><a href="#">Leeanna Alvord</a></h6>
                                                <span class="font-small-2">10 Dec 2018 at 5:35 AM</span>
                                            </div>
                                        </div>
                                        <p>Wafer I love brownie jelly bonbon tart. Candy jelly beans powder brownie
                                            biscuit.
                                            Jelly marzipan oat cake cake.</p>
                                        <iframe src="https://www.youtube.com/embed/WALZwXyxpHQ"
                                                class="w-100 height-250"></iframe>
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="d-flex  cursor-pointeralign-items-center">
                                                <i class="feather icon-heart font-medium-2 mr-50"></i>
                                                <span>269</span>
                                            </div>
                                            <div class="ml-2">
                                                <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Vinnie Mostowy"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="{{asset('theme/app-assets/images/portrait/small/avatar-s-5.jpg')}}"
                                                             alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Elicia Rieske"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="{{asset('theme/app-assets/images/portrait/small/avatar-s-7.jpg')}}"
                                                             alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Julee Rossignol"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="{{asset('theme/app-assets/images/portrait/small/avatar-s-10.jpg')}}"
                                                             alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Darcey Nooner"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="{{asset('theme/app-assets/images/portrait/small/avatar-s-8.jpg')}}"
                                                             alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Elicia Rieske"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                             src="{{asset('theme/app-assets/images/portrait/small/avatar-s-7.jpg')}}"
                                                             alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li class="d-inline-block pl-50">
                                                        <span>+264 more</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="ml-auto d-flex align-items-center">
                                                <i class="feather icon-message-square font-medium-2 mr-50"></i>98
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-50">
                                                <img src="{{asset('theme/app-assets/images/portrait/small/avatar-s-8.jpg')}}"
                                                     alt="Avatar" height="30" width="30">
                                            </div>
                                            <div class="user-page-info">
                                                <h6 class="mb-0">Darcey Nooner</h6>
                                                <span class="font-small-2">I love cupcake danish jujubes sweet.</span>
                                            </div>
                                            <div class="ml-auto cursor-pointer">
                                                <i class="feather icon-heart mr-50"></i>
                                                <i class="feather icon-message-square"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mb-2">
                                            <div class="avatar mr-50">
                                                <img src="{{asset('theme/app-assets/images/portrait/small/avatar-s-6.jpg')}}"
                                                     alt="Avatar" height="30" width="30">
                                            </div>
                                            <div class="user-page-info">
                                                <h6 class="mb-0">Lai Lewandowski</h6>
                                                <span class="font-small-2">Wafer I love brownie jelly bonbon tart apple pie</span>
                                            </div>
                                            <div class="ml-auto cursor-pointer">
                                                <i class="feather icon-heart mr-50"></i>
                                                <i class="feather icon-message-square"></i>
                                            </div>
                                        </div>
                                        <fieldset class="form-label-group mb-50">
                                        <textarea class="form-control" id="label-textarea3" rows="3"
                                                  placeholder="Add Comment"></textarea>
                                            <label for="label-textarea3">Add Comment</label>
                                        </fieldset>
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>About</h4>
                                        <i class="feather icon-more-horizontal cursor-pointer"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>Nextdoor partners with public agencies across the country, providing them a way to share important updates with neighbors.</p>
                                        <p>
                                            If you’d like to introduce us to your local public safety officials, please contact our team at:
                                        </p>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Email:</h6>
                                            <p>mail@domain.com</p>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="mb-0">Contact:</h6>
                                            <p>+923000000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-primary block-element mb-1">Load More</button>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
