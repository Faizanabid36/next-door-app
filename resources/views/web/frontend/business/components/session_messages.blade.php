@if(Session::has('success'))
    <div class="alert alert-success text-success">
        <a class="uk-alert-close text-danger" uk-close></a>
        <strong><i>Success:</i></strong> {{Session::get('success')}}
    </div>
@endif

@if(Session::has('errors'))
    <div class="text-danger alert alert-danger">
        <a class="uk-alert-close font-weight-bold" uk-close></a>
        <strong><i>Error:</i></strong> {{Session::get('errors')->first()}}
    </div>
@endif
@if(Session::has('error'))
    <div class="text-danger alert alert-danger">
        <a class="uk-alert-close font-weight-bold" uk-close></a>
        <strong><i>Error:</i></strong> {{Session::get('error')}}
    </div>
@endif
