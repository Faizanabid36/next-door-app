@if(Session::has('success'))
    <div class="bg-gradient-success shadow-success uk-light text-white" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <strong>Success:</strong> {{Session::get('success')}}
    </div>
@endif

@if(Session::has('errors'))
    <div class="bg-gradient-danger shadow-danger uk-light text-white" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <strong>Error:</strong> {{Session::get('errors')->first()}}
    </div>
@endif
@if(Session::has('error'))
    <div class="bg-gradient-danger shadow-danger uk-light text-white" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <strong>Error:</strong> {{Session::get('error')}}
    </div>
@endif
