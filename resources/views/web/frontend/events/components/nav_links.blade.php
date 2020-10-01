<div class="section-header pb-2">
    <div class="section-header-left">
        <h1 class="text-dark"><i>Events in the Community</i></h1>
    </div>
</div>

<nav class="responsive-tab style-4 mb-3">
    <ul>
        <li class="{{Request::is('event')?'uk-active uk-text-italic':''}}">
            <a href="{{route('event.index')}}">
                Events
            </a>
        </li>
        <li class="{{Request::is('myevents')?'uk-active uk-text-italic':''}}">
            <a href="{{route('event.my_events')}}">
                My Events
            </a>
        </li>
    </ul>
</nav>
