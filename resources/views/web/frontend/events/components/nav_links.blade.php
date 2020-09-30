<div class="section-header pb-2">
    <div class="section-header-left">
        <h3 class="text-dark"><i>Events in the Community</i></h3>
    </div>
</div>

<nav class="responsive-tab style-4 mb-3">
    <ul>
        <li class="{{Request::is('agency/feed')?'uk-active uk-text-italic':''}}">
            <a href="{{route('agency.feed')}}">
                Feed
            </a>
        </li>
        <li class="{{Request::is('agency/list')?'uk-active uk-text-italic':''}}">
            <a href="{{route('agency.list')}}">
                Public Agencies
            </a>
        </li>
    </ul>
</nav>
