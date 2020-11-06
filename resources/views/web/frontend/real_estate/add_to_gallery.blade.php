@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner p-sm-0 ml-sm-4">

        <h1 class="text-dark"> Business Page Gallery Settings </h1>

        <div class="uk-position-relative" uk-grid>
            <div class="uk-width-3-3@m mt-sm-3 pl-sm-0 p-sm-4">
                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0 text-dark"> Add Images To Gallery </h5>
                    </div>
                    <hr class="m-0">
                    @include('web.frontend.accounts.components.session_messages')
                    <form class="p-4" novalidate method="POST"
                          enctype='multipart/form-data'
                          action="{{route('real_estate.gallery.store',$property->id)}}">
                        @csrf
                        <input type="hidden" value="{{$property->id}}" name="property_id">
                        <div class="mb-5 media-upload-image">
                            <a href="javascript: void(0);">
                                <img src="{{asset(auth()->user()->avatar)}}"
                                     id="gallery_picture"
                                     class="rounded mr-75" alt="profile image" height="64"
                                     width="80">
                            </a>
                            <div class="media-body">
                                <div
                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                    <label
                                        class="btn btn-sm small button primary cursor-pointer ml-50 mb-50 mb-sm-0 text-white"
                                        for="account-upload">
                                        Upload new photo
                                    </label>
                                    <input onchange="loadFile(event)" type="file" name="Picture"
                                           id="account-upload"
                                           hidden>
                                </div>
                                <p class="ml-75 mt-50 text-dark"><small>Allowed JPG, GIF or
                                        PNG.
                                        Max
                                        size of
                                        2MB</small></p>
                            </div>
                        </div>
                        <div class="uk-flex">
                            <button class="button primary"><span class="uil-image-upload mr-25"></span>Add to gallery
                            </button>
                        </div>
                    </form>
                </div>

                <div class="uk-card-default rounded mt-lg-5">
                    <div class="p-3">
                        <h5 class="mb-0 text-dark"> Images Already in Gallery </h5>
                    </div>
                    <hr class="m-0">
                    <div class="uk-child-width-1-4@s p-4" uk-grid>
                        @if(count($property->attachments)>0)
                            @foreach($property->attachments as $bi)
                                <div class="">
                                    <img style="border-radius: 15px;
                                                width: 100%;
                                                height: 75%;"
                                         class="shadow mb-30"
                                         src="{{$bi->image_url}}" alt="">
                                    <p class="font-weight-bold text-center">
                                        <a onclick="deleteImage({{$bi->id}})" class="text-danger">
                                            <span class="uil-trash-alt"></span>
                                            Remove Image
                                        </a>
                                    </p>
                                </div>
                            @endforeach
                    </div>
                </div>
                @else
                    <div>
                        <h2>
                            You haven't uploaded any picture yet
                        </h2>
                    </div>
                @endif
            </div>

        </div>

    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        let loadFile = function (event) {
            let image = document.getElementById('gallery_picture');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
        let deleteImage = (id) => {
            let confirmation = confirm('Do You want to delete it?');
            if (confirmation)
                window.location = window.location.origin + `/real_estate/listing/{{$property->id}}/gallery/${id}/delete`

        }
    </script>
@endsection
