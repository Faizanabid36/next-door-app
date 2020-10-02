<div class="section-header pb-2">
    <div class="section-header-left">
        <h1 class="text-dark"><i>Events in the Community</i></h1>
    </div>
</div>
<div class="responsive-tab uk-flex uk-flex-between">
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
    <button class="button primary small circle pull-right" id="modal_button" data-toggle="modal"
            data-target="#postNewEvent">
        <i class="uil-plus"> </i> Post An Event
    </button>
</div>
