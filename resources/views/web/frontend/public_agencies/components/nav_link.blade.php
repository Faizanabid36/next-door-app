<div class="section-header pb-2">
    <div class="section-header-left">
        <h3> Public Agencies </h3>
    </div>
</div>

<nav class="responsive-tab style-4 mb-3">
    <div class="uk-flex uk-flex-between">
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
        @if(auth()->user()->is_public_agent)
            <button class="rounded uk-button-small uk-button uk-button-primary py-0 px-3 m-0">
                <a href="#addNewModal" uk-toggle class="text-white p-0 m-0">New Post
                </a>
            </button>
        @endif
    </div>
</nav>
