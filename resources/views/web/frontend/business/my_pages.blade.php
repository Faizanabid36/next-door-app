@extends('layouts.salika.index')

@section('content')

    <div class="main_content_inner p-sm-0 ml-sm-4">

        <h1 class="text-dark"> Business Page </h1>

        <div class="uk-position-relative" uk-grid>

            @include('web.frontend.business.components.setting_sidebar')
            <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0 text-dark"> list of your personal business page </h5>
                    </div>
                    <hr class="m-0">
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
                    <div class="p-4">
                        @if(count($businesses) > 0)
                            @foreach($businesses as $key => $business)
                                <h3 class="uk-heading-line ">
                                    <img src="{{$business->display_banner}}"
                                         width="60" alt=""
                                         style="z-index: 99999;border-radius: 5px">
                                    <a href="{{route('business.view_business_page',$business->id)}}" class="font-weight-bold btn-link">{{$business->title}}</a>
                                </h3>
                                <div>
                                    <span class="pull-left">Created: {{$business->created_at->diffForHumans()}}</span>
                                    <a title="Delete" href="{{route('business.delete_business_page',$business->id)}}" style="float: right"><span class="p-1 uil-trash text-danger"> </span></a>
                                    <a title="Edit" href="{{route('business.edit_business_page',$business->id)}}" style="float: right"><span class="p-1 uil-edit text-primary"> </span></a>
                                </div>
                            @endforeach
                        @else
                            <h2 class="text-dark">
                                You have not created any business page yet.
                            </h2>
                            <a class="btn-link" href=""><span class="uil-location-arrow"><u>Create one now</u></span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        let loadFile = function (event) {
            let image = document.getElementById('display_banner');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
