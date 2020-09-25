<a class="chat-plus-btn" href="#sidebar-chat" uk-toggle>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path>
    </svg>
    <!--  Chat -->
</a>
<div id="sidebar-chat" class="sidebar-chat px-3" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">

        <div class="sidebar-chat-head mb-2">
            <h2 class="text-center"> Chats </h2>
        </div>
        <ul class="uk-child-width-expand sidebar-chat-tabs" uk-tab>
            <li class="uk-active"><a href="#">Contacts</a></li>
        </ul>
        @foreach($users as $user)
            <a href="{{route('user',$user->id)}}">
                <div class="contact-list">
                    <div class="contact-list-media"><img src="{{$user->avatar}}">
                        @if($user->active_status)
                            <span class="online-dot"></span>
                        @else
                            <span class="offline-dot"></span>
                        @endif
                    </div>
                    <h5> {{$user->name}} </h5>
                </div>
            </a>
        @endforeach
    </div>
</div>
