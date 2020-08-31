<div class="uk-width-1-4@m uk-flex-last@m pl-sm-0">
    <nav class="responsive-tab style-3 setting-menu"
         uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top">
        <ul>
            <li class="{{Request::is('business/create/page')?'uk-active':''}}">
                <a href="{{route('business.create_business_page')}}"> <i class="uil-cog"></i> General </a>
            </li>
            <li class="{{Request::is('business/my_business')?'uk-active':''}}">
                <a href="{{route('business.my_business')}}"> <i class="uil-document"></i> My Pages</a>
            </li>
        </ul>
    </nav>
</div>
