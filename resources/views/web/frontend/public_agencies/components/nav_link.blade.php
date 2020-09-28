<div class="section-header pb-2">
    <div class="section-header-left">
        <h3> Your Groups </h3>
    </div>
</div>

<nav class="responsive-tab style-4 mb-3">
    <ul>
        <li class="{{Request::is('agency/feed')?'uk-active':''}}"><a href="{{route('agency.feed')}}"> Feed </a>
        </li>
        <li class="{{Request::is('agency/list')?'uk-active':''}}"><a href="{{route('agency.list')}}"> Public
                Agencies</a></li>
    </ul>
</nav>
