@extends('layouts.salika.index')

@section('content')

    <div class="main_content_inner p-sm-0 ml-sm-4">

        <h1 class="text-dark"> Business Page </h1>

        <div class="uk-position-relative" uk-grid>

            @include('web.frontend.business.components.setting_sidebar')
            <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-3">
                        <h5 class="mb-0 text-dark"> Create your personal business page </h5>
                    </div>
                    <hr class="m-0">
                    @include('web.frontend.business.components.session_messages')
                    <form class="p-4" novalidate method="POST"
                          enctype='multipart/form-data'
                          action="{{route('business.store_business_page')}}">
                        @csrf
                        <div class="mb-5 media-upload-image">
                            <a href="javascript: void(0);">
                                <img src="{{asset('salika/assets/images/icons/market.png')}}"
                                     id="display_cover_picture"
                                     class="rounded mr-75" alt="profile image" height="64"
                                     width="125">
                            </a>
                            <div class="media-body">
                                <div
                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                    <label
                                        class="btn btn-sm small button primary cursor-pointer ml-50 mb-50 mb-sm-0 text-white"
                                        for="cover-upload">
                                        Upload new cover photo
                                    </label>
                                    <input onchange="loadCover(event)" type="file" name="banner_2"
                                           id="cover-upload"
                                           hidden>
                                </div>
                                <p class="ml-75 mt-50 text-dark"><small>Allowed JPG, GIF or
                                        PNG.
                                        Max
                                        size of
                                        5MB</small></p>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-5 media-upload-image">
                            <a href="javascript: void(0);">
                                <img src="{{asset('salika/assets/images/icons/market.png')}}"
                                     id="display_banner"
                                     class="rounded mr-75" alt="profile image" height="64"
                                     width="80">
                            </a>
                            <div class="media-body">
                                <div
                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                    <label
                                        class="btn btn-sm small button primary cursor-pointer ml-50 mb-50 mb-sm-0 text-white"
                                        for="image-upload">
                                        Upload new photo
                                    </label>
                                    <input onchange="loadFile(event)" type="file" name="banner_1"
                                           id="image-upload"
                                           hidden>
                                </div>
                                <p class="ml-75 mt-50 text-dark"><small>Allowed JPG, GIF or
                                        PNG.
                                        Max
                                        size of
                                        2MB</small></p>
                            </div>
                            <hr class="mt-2">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Business Title </h5>
                            <input value="{{old('title')}}" type="text" name="title" class="uk-input text-dark"
                                   placeholder="Enter Business Title">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Business Description </h5>
                            <textarea name="description" class="uk-textarea text-dark" rows="5"
                                      placeholder="Tell people more about your business...">{{old('description')}}</textarea>
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Business Email </h5>
                            <input value="{{old('email')}}" type="text" name="email" class="uk-input text-dark"
                                   placeholder="Enter Business Email">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Select Business Category </h5>
                            <select name="business_category_id" class="uk-input text-dark">
                                <option value="" disabled selected>Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ucfirst($category->b_category_title)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Primary Contact Number </h5>
                            <input value="{{old('contact_1')}}" type="text" name="contact_1" class="uk-input text-dark"
                                   placeholder="Primary Contact Number">
                        </div>
                        <div class="mb-3">
                            <h5 class="uk-text-bold mb-2 text-dark"> Secondary Contact Number </h5>
                            <input value="{{old('contact_2')}}" type="text" name="contact_2" class="uk-input text-dark"
                                   placeholder="Secondary Contact Number">
                        </div>
                        <div class="mb-1">
                            <h5 class="uk-text-bold mb-2 text-dark"> Postal Code </h5>
                            <input value="{{old('postal_code')}}" type="text" name="postal_code"
                                   class="uk-input text-dark" placeholder="Postal Code">
                        </div>
                        <br>
                        <div class="uk-flex">
                            <button class="button primary"><span class="uil-check"></span> Publish My Page</button>
                        </div>
                    </form>
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
        let loadCover = function (event) {
            let cover_image = document.getElementById('display_cover_picture');
            cover_image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
