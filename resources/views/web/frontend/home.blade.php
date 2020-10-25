@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner">
        <div class="uk-flex uk-flex-between">
            <h1 class="color-black"><i>{{ucfirst(str_replace('-',' ',$type))}}</i></h1>
            <a class="button primary small circle pull-right uk-button-default" href="#addNewModal" uk-toggle>
                <i class="uil-plus mr-2"></i>New Post
            </a>
        </div>
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m fead-area" id="feed-area">
                <div id="laoding-data"><h2 class="text-dark text-center">
                        Please Wait, while the data is being loaded...!
                    </h2>
                </div>
            </div>
            <div class="uk-width-expand">
                <div class="group-card shadow">
                    <div class="group-card-content">
                        <h2 class="text-dark text-center mb-0"><i>About News Feed</i></h2>
                        <hr>
                        <p class="info m-2">
                            Salika partners with public agencies across the country, providing them a way to share
                            important updates
                            with neighbors.
                            If you’d like to introduce us to your local public safety officials,
                            <a class="text-primary" href="mailto:nmorris@salika.ph">please email our team.</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@include('web.frontend.components.new_post_modal', [$action='PostController@store'])
