@include('Chatify::layouts.headLinks')
<div class="messenger" style="font-family: 'IBM Plex Sans' , Helvetica, Arial, 'lucida grande', tahoma, verdana, arial, sans-serif">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle text-dark">Messages</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
{{--                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>--}}
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Search" />
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
                <a href="#" @if($route == 'user') class="active-tab font-weight-bold" @endif data-view="users">
                    <span class="far fa-user"></span> Contacts List</a>
{{--                <a href="#" @if($route == 'group') class="active-tab" @endif data-view="groups">--}}
{{--                    <span class="fas fa-users"></span> Groups</a>--}}
            </div>
        </div>
        {{-- tabs and lists --}}
        <div class="m-body">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="@if($route == 'user') show @endif messenger-tab app-scroll" data-view="users">

               {{-- Favorites --}}
               <p class="messenger-title text-dark">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>

               {{-- Saved Messages --}}
               {!! view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render() !!}

               {{-- Contact --}}
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);"></div>

           </div>

           {{-- ---------------- [ Group Tab ] ---------------- --}}
           <div class="@if($route == 'group') show @endif messenger-tab app-scroll" data-view="groups">
                {{-- items --}}
                <p style="text-align: center;color:grey;">Soon will be available</p>
             </div>

             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title">Search</p>
                <div class="search-records">
                    <p class="message-hint"><span>Type to search..</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav>
                {{-- header back button, avatar and user name --}}
                <div style="display: inline-flex;">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ ucfirst(config('chatify.name')) }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite mt-1"><i class="fas fa-star fa-5x"></i></a>
                    <a class="ml-4" href="{{ route('dashboard') }}"><img src="{{asset('salika/assets/images/icons/home.png')}}" width="25"></a>
                    <a href="#" class="show-infoSide ml-4 mr-2"><img src="{{asset('salika/assets/images/icons/info.png')}}" width="25"></a>
                </nav>
            </nav>
        </div>
        {{-- Internet connection --}}
        <div class="internet-connection mt-2">
            <span class="ic-connected">Connected</span>
            <span class="ic-connecting">Connecting...</span>
            <span class="ic-noInternet">No internet access</span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body app-scroll" style="background: rgba(154, 161, 170, 0.13)">
            <div class="messages">
                <h3 class="message-hint" style="margin-top: calc(30% - 126.2px);">
                    <span class="text-dark">Please select a chat to start messaging</span>
                </h3>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
