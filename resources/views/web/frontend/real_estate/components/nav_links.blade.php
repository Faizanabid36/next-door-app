<div class="section-header pb-2">
    <div class="section-header-left">
        <h1 class="text-dark"><i>Real Estate</i></h1>
    </div>
</div>
<div class="responsive-tab uk-flex uk-flex-between">
    <ul>
        <li class="{{Request::is('real_estate/listings')?'uk-active uk-text-italic':''}}">
            <a href="{{route('real_estate.listings')}}">
                Nearby Properties
            </a>
        </li>
        <li class="{{Request::is('real_estate/my_listings')?'uk-active uk-text-italic':''}}">
            <a href="{{route('real_estate.my_listings')}}">
                My Properties
            </a>
        </li>
    </ul>
    {{--    <button class="button primary small circle pull-right" id="modal_button" data-toggle="modal"--}}
    {{--            data-target="#postNewEvent">--}}
    {{--        <i class="uil-plus"> </i> Post A New Property--}}
    {{--    </button>--}}
</div>
