@extends('layouts.salika.index')


@section('content')
    <div class="main_content_inner">
        @include('web.frontend.public_agencies.components.nav_link')
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m fead-area" id="feed-area">
                <div id="laoding-data"><h2 class="text-dark text-center">
                        Please Wait, while the data is being loaded...!
                    </h2>
                </div>
            </div>
            @include('web.frontend.public_agencies.components.side_info')
        </div>
    </div>
@endsection

@include('web.frontend.components.new_post_modal', [$action='PostController@store'])

