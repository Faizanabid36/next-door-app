

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Next Door</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="/"><i class="feather icon-home"></i><span class="menu-title"
                                                                                         data-i18n="Dashboard">Home</span></a>
                </li>
                <li class=" navigation-header"><span>Neighborhood</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-calendar"></i><span class="menu-title"
                                                                                             data-i18n="Email">Events</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-alert-octagon"></i><span class="menu-title"
                                                                                                  data-i18n="Email">Crime and Safety</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-help-circle"></i><span class="menu-title"
                                                                                                data-i18n="Email">Lost and Found</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-file-text"></i><span class="menu-title"
                                                                                              data-i18n="Email">Documents</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-file-minus"></i><span class="menu-title"
                                                                                               data-i18n="Email">General</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('public_agencies')}}">
                        <i class="feather icon-user-check"></i><span class="menu-title" data-i18n="Email">Public Agencies</span></a>
                </li>
                <li class=" navigation-header"><span>pages</span>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span
                            class="menu-title" data-i18n="Profile">Profile</span></a>
                </li>
                @if(isset(auth()->user()->id)&&auth()->user()->id==1)
                    <li class=" nav-item"><a href="{{ route('admin.neighbours')}}"><i
                                class="feather icon-users"></i><span class="menu-title"
                                                                     data-i18n="Email">Neighbours</span></a>
                    </li>
                @else
                    <li class=" nav-item"><a href="{{ route('neighbours')}}"><i class="feather icon-users"></i><span
                                class="menu-title" data-i18n="Email">Neighbours</span></a>
                    </li>
                @endif
                <li class=" nav-item"><a href="{{ route('ecommerce')}}"><i class="feather icon-user"></i><span
                    class="menu-title" data-i18n="Profile">Ecommerce</span></a>
                </li>
                @if(isset(auth()->user()->id)&&auth()->user()->id==1)
                    @include('layouts.admin_sidebar')
                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
