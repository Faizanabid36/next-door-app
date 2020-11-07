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
                          action="{{route('real_estate.update',$property->id)}}">
                        @csrf
                        <div class="mb-3 bg-secondary p-3">
                                <span class="alert">
                                    Update Gallery of your property Here
                                    <a class="btn-link"
                                       href="{{route('real_estate.gallery',$property->id)}}">Click Here to upload Images</a>
                                </span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Property Type </h5>
                                <select name="property_type" class="
                                @error('property_type')uk-form-danger @enderror
                                    uk-select text-dark">
                                    <option
                                        {{$property->property_type=='residential'?'selected':''}} value="residential">{{ucfirst('residential')}}</option>
                                    <option
                                        {{$property->property_type=='rental'?'selected':''}} value="rental">{{ucfirst('rental')}}</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Current Status </h5>
                                <select name="status" class="
                                @error('status')uk-form-danger @enderror
                                    uk-select text-dark">
                                    <option
                                        {{$property->status=='pending'?'selected':''}} value="pending">{{ucfirst('pending')}}</option>
                                    <option
                                        {{$property->status=='for_sale'?'selected':''}} value="for_sale">{{ucfirst('for Sale')}}</option>
                                    <option
                                        {{$property->status=='sold'?'selected':''}} value="sold">{{ucfirst('sold')}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark">Property Description </h5>
                                <textarea name="description" class="
                                @error('description')uk-form-danger @enderror
                                    uk-textarea text-dark" rows="6"
                                          placeholder="Enter a brief Description...">{{$property->description}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Enter City </h5>
                                <input value="{{$property->city}}" type="text" name="city"
                                       class="
                                       @error('city')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Enter Neighbourhood </h5>
                                <input value="{{$property->neighbourhood}}" type="text" name="neighbourhood"
                                       class="
                                       @error('neighbourhood')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Enter Neighbourhood">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> No. Bed Rooms </h5>
                                <input value="{{$property->no_of_bed_rooms}}" type="number" min="0"
                                       name="no_of_bed_rooms"
                                       class="
                                       @error('no_of_bed_rooms')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="No. Bed Rooms">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> No. Bath Rooms </h5>
                                <input value="{{$property->no_of_bath_rooms}}" type="number" min="0"
                                       name="no_of_bath_rooms"
                                       class="
                                       @error('no_of_bath_rooms')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="No. Bath Rooms">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Area(Sq.ft) </h5>
                                <input value="{{$property->area_in_sqft}}" type="number" min="0" name="area_in_sqft"
                                       class="
                                       @error('area_in_sqft')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Area in sq.ft">
                            </div>

                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Estimated Price </h5>
                                <input value="{{$property->price}}" type="number" min="0" name="price"
                                       class="
                                       @error('price')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Maximum Estimated Price">
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Rental Estimation </h5>
                                <input value="{{$property->rental_estimate}}" type="number" min="0"
                                       name="rental_estimate"
                                       class="
                                       @error('rental_estimate')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Rental Estimation(optional)">
                            </div>

                            {{--                            <div class="col-md-4 mb-3">--}}
                            {{--                                <h5 class="uk-text-bold mb-2 text-dark"> Built in Year </h5>--}}
                            {{--                                <input value="{{$property->>postal_code="number" name="year_built"--}}
                            {{--                                       class="--}}
                            {{--                                       @error('year_built')uk-form-danger @enderror--}}
                            {{--                                           uk-input text-dark"--}}
                            {{--                                       placeholder="Built in Year(optional)">--}}
                            {{--                            </div>--}}
                            <div class="col-md-4 mb-3">
                                <h5 class="uk-text-bold mb-2 text-dark"> Postal Code </h5>
                                <input value="{{$property->postal_code}}" type="number" name="postal_code"
                                       class="
                                       @error('postal_code')uk-form-danger @enderror
                                           uk-input text-dark"
                                       placeholder="Postal Code">
                            </div>
                        </div>
                        <div class="uk-flex">
                            <button class="button primary"><span class="uil-edit"></span> Update Property</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
