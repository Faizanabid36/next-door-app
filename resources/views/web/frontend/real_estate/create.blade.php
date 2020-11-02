@extends('layouts.salika.index')

@section('content')

    <div class="main_content_inner p-sm-0 ml-sm-4">

        <h1 class="text-dark"><i>Real Estate</i></h1>

        <div class="uk-position-relative" uk-grid>

            {{--            @include('web.frontend.business.components.setting_sidebar')--}}
            <div class="uk-width-3-3@m mt-sm-3 pl-sm-0 p-sm-4">

                <div class="uk-card-default rounded">
                    <div class="p-4">
                        <h4 class="mb-0 text-dark"><i>Add your personal property listing</i></h4>
                    </div>
                    <hr class="m-0">
                    @include('web.frontend.business.components.session_messages')
                    <form class="p-4" novalidate method="POST"
                          enctype='multipart/form-data'
                          action="{{route('real_estate.store')}}">
                        @csrf
                        @if(Session::has('property_id'))
                            <div class="mb-3 bg-secondary p-3">
                                <span class="alert">
                                    You have Posted A New Property,
                                    <a class="btn-link" href="#">Click Here to upload Images</a>
                                </span>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Address </h5>
                                <input value="{{old('address')}}" type="text" name="address" class="
                                @error('address')uk-form-danger @enderror
                                    uk-input text-dark" placeholder="Enter Address">
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Property Type </h5>
                                <select name="property_type" class="
                                @error('property_type')uk-form-danger @enderror
                                    uk-select text-dark">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="residential">{{ucfirst('residential')}}</option>
                                    <option value="rental">{{ucfirst('rental')}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark">Property Description </h5>
                                <textarea name="description" class="
                                @error('description')uk-form-danger @enderror
                                    uk-textarea text-dark" rows="6"
                                          placeholder="Enter a brief Description...">{{old('description')}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Enter City </h5>
                                <input value="{{old('city')}}" type="text" name="city"
                                       class="
                                       @error('city')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Enter Neighbourhood </h5>
                                <input value="{{old('neighbourhood')}}" type="text" name="neighbourhood"
                                       class="
                                       @error('neighbourhood')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Enter Neighbourhood">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> No. Bed Rooms </h5>
                                <input value="{{old('no_of_bed_rooms')}}" type="number" min="0" name="no_of_bed_rooms"
                                       class="
                                       @error('no_of_bed_rooms')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="No. Bed Rooms">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> No. Bath Rooms </h5>
                                <input value="{{old('no_of_bath_rooms')}}" type="number" min="0" name="no_of_bath_rooms"
                                       class="
                                       @error('no_of_bath_rooms')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="No. Bath Rooms">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Area(Sq.ft) </h5>
                                <input value="{{old('area_in_sqft')}}" type="number" min="0" name="area_in_sqft"
                                       class="
                                       @error('area_in_sqft')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Area in sq.ft">
                            </div>

                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Maximum Estimated Price </h5>
                                <input value="{{old('maximum_price')}}" type="number" min="0" name="maximum_price"
                                       class="
                                       @error('maximum_price')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Maximum Estimated Price">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Minimum Estimated Price </h5>
                                <input value="{{old('minimum_price')}}" type="number" min="0" name="minimum_price"
                                       class="
                                       @error('minimum_price')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Minimum Estimated Price">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Rental Estimation </h5>
                                <input value="{{old('rental_estimate')}}" type="number" min="0" name="rental_estimate"
                                       class="
                                       @error('rental_estimate')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Rental Estimation(optional)">
                            </div>

                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Built in Year </h5>
                                <input value="{{old('year_built')}}" type="number" name="year_built"
                                       class="
                                       @error('year_built')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Built in Year(optional)">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Postal Code </h5>
                                <input value="{{old('postal_code')}}" type="number" name="postal_code"
                                       class="
                                       @error('postal_code')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Postal Code">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Current Status </h5>
                                <select name="status" class="
                                @error('status')uk-form-danger @enderror
                                    uk-select text-dark">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="pending">{{ucfirst('pending')}}</option>
                                    <option value="for_sale">{{ucfirst('for Sale')}}</option>
                                    <option value="sold">{{ucfirst('sold')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-flex">
                            <button class="button primary"><span class="uil-check"></span> Post Property</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
