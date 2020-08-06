@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner">

        <div class="uk-flex uk-flex-between">
            <h1> Free and Sale Items </h1>
            <button class="button primary small circle pull-right" data-toggle="modal" data-target="#postNewItem"><i
                    class="uil-plus"> </i> Post New Item
            </button>
        </div>
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

        <div class="section-header">
            <div class="section-header-left">
                <h3> Categories </h3>
            </div>
            {{--            <div class="section-header-right">--}}
            {{--                <a href="#" class="see-all"> See all</a>--}}
            {{--            </div>--}}
        </div>

        <div class="uk-position-relative" uk-slider="finite: true">

            <div class="uk-slider-container pb-3">

                <ul
                    class="uk-slider-items uk-child-width-1-6@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">

                    <li>

                        <a href="#">
                            <div class="group-catagroy-card" data-src="{{asset('salika/assets/images/product/11.jpg')}}"
                                 uk-img>
                                <div class="group-catagroy-card-content">
                                    <h4> Shoes </h4>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="group-catagroy-card" data-src="{{asset('salika/assets/images/product/1.jpg')}}"
                                 uk-img>
                                <div class="group-catagroy-card-content">
                                    <h4> headphones </h4>
                                </div>
                            </div>
                        </a>

                    </li>
                    <li>

                        <a href="#">
                            <div class="group-catagroy-card" data-src="{{asset('salika/assets/images/product/7.jpg')}}"
                                 uk-img>
                                <div class="group-catagroy-card-content">
                                    <h4> Fruits </h4>
                                </div>
                            </div>
                        </a>

                    </li>
                    <li>

                        <a href="#">
                            <div class="group-catagroy-card" data-src="{{asset('salika/assets/images/product/4.jpg')}}"
                                 uk-img>
                                <div class="group-catagroy-card-content">
                                    <h4> Mobiles </h4>
                                </div>
                            </div>
                        </a>

                    </li>
                    <li>

                        <a href="#">
                            <div class="group-catagroy-card" data-src="{{asset('salika/assets/images/product/13.jpg')}}"
                                 uk-img>
                                <div class="group-catagroy-card-content">
                                    <h4> Parfums </h4>
                                </div>
                            </div>
                        </a>

                    </li>
                    <li>

                        <a href="#">
                            <div class="group-catagroy-card" data-src="{{asset('salika/assets/images/product/15.jpg')}}"
                                 uk-img>
                                <div class="group-catagroy-card-content">
                                    <h4> Oils </h4>
                                </div>
                            </div>
                        </a>

                    </li>
                    {{--                    <li>--}}

                    {{--                        <a href="#">--}}
                    {{--                            <div class="group-catagroy-card" data-src="{{asset('salika/assets/images/product/3.jpg')}}" uk-img>--}}
                    {{--                                <div class="group-catagroy-card-content">--}}
                    {{--                                    <h4> Laptops </h4>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </a>--}}

                    {{--                    </li>--}}
                </ul>

                <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev" href="#"
                   uk-slider-item="previous"></a>
                <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#"
                   uk-slider-item="next"></a>

            </div>
        </div>

        <hr class="my-3 my-sm-2">
        <div uk-slider="finite: true">

            <div class="grid-slider-header">
                <div>
                    <h3> Fresh Fruit </h3>
                </div>
                <div class="grid-slider-header-link">

                    <a href="#" class="button transparent uk-visible@m"> View all </a>
                    <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
                    <a href="#" class="slide-nav-next" uk-slider-item="next"></a>
                </div>
            </div>

            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-3@s uk-grid-small uk-grid">
                <li>
                    <a href="m-single-product.html">
                        <div class="market-list">
                            <div class="item-media">
                                <img src="{{asset('salika/assets/images/product/6.jpg')}}" alt="">
                            </div>
                            <div class="item-inner">
                                <div class="item-price"> 42$</div>
                                <div class="item-title"> Yogur tFruit Vanilla</div>
                                <div class="item-statistic">
                                            <span> <i class="uil-thumbs-up"></i> <span class="count">40</span> likes
                                            </span>
                                    <span> <i class="uil-eye"></i> <span class="count">160</span> views </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>

                    <a href="m-single-product.html">
                        <div class="market-list">
                            <div class="item-media">
                                <img src="{{asset('salika/assets/images/product/7.jpg')}}" alt="">
                            </div>
                            <div class="item-inner">
                                <div class="item-price"> 35$</div>
                                <div class="item-title"> Strawberries Fresh Ripe</div>
                                <div class="item-statistic">
                                            <span> <i class="uil-thumbs-up"></i> <span class="count">2</span> likes
                                            </span>
                                    <span> <i class="uil-eye"></i> <span class="count">286</span> views </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="m-single-product.html">
                        <div class="market-list">
                            <div class="item-media">
                                <img src="{{asset('salika/assets/images/product/8.jpg')}}" alt="">
                            </div>
                            <div class="item-inner">
                                <div class="item-price"> 29$</div>
                                <div class="item-title"> Fruit Basket Grapes</div>
                                <div class="item-statistic">
                                            <span> <i class="uil-thumbs-up"></i> <span class="count">2</span> likes
                                            </span>
                                    <span> <i class="uil-eye"></i> <span class="count">106</span> views </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="m-single-product.html">
                        <div class="market-list">
                            <div class="item-media">
                                <img src="{{asset('salika/assets/images/product/9.jpg')}}" alt="">
                            </div>
                            <div class="item-inner">
                                <div class="item-price"> 20$</div>
                                <div class="item-title"> Cocooil baby oil on desk</div>
                                <div class="item-statistic">
                                            <span> <i class="uil-thumbs-up"></i> <span class="count">2</span> likes
                                            </span>
                                    <span> <i class="uil-eye"></i> <span class="count">286</span> views </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>

            </ul>

        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="postNewItem" tabindex="-1" role="dialog" aria-labelledby="postNewItemTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Post New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form novalidate method="POST"
                          enctype='multipart/form-data'
                          action="{{route('add_item')}}">
                        @csrf
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Title </h5>
                            <input type="text" name="title" class="uk-input uk-form-small" placeholder="Item Title">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Description </h5>
                            <textarea name="description" class="uk-textarea uk-form-small" rows="3"
                                      placeholder="Enter Description"></textarea>
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Price </h5>
                            <input type="number" name="price" id="price" class="uk-input uk-form-small" placeholder="Item Price">
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Category </h5>
                            <select name="cat_id" class="uk-input uk-form-small">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">
                                        {{ucfirst($cat->name)}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" mb-2" >
                            <h5 class="uk-text-bold mb-1"> Item Images </h5>
                            <div class="custom-file">
                                <input name="image_0" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Main Image(Required)</label>
                            </div>
                        </div>
                        <div class=" mb-2" >
                            <div class="custom-file">
                                <input name="image_1" type="file" class="custom-file-input file-input-0" id="customFile0">
                                <label class="custom-file-label file-label-0" for="customFile0">Choose Image(Optional)</label>
                            </div>
                        </div>
                        <div class=" mb-3" >
                            <div class="custom-file">
                                <input name="image_2" type="file" class="custom-file-input file-input-1" id="customFile1">
                                <label class="custom-file-label file-label-1" for="customFile1">Choose Image(Optional)</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <h5 class="uk-text-bold mb-1"> Free
                                <input onchange="change()" type="checkbox" id="is_free" name="is_free" class="uk-checkbox ">
                            </h5>
                            <input type="submit" value="Post Item" style="float: right" class="uk-button rounded button primary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script>
        $( document ).ready(function() {
            console.log( "ready!" );
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName)
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            $(".file-input-0").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName)
                $(this).siblings(".file-label-0").addClass("selected").html(fileName);
            });
            $(".file-input-1").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                console.log(fileName)
                $(this).siblings(".file-label-1").addClass("selected").html(fileName);
            });
        });
        const change = () =>{
            let cb = document.getElementById("is_free")
            if(cb && cb.checked === true){
                document.getElementById("price").value=0
                document.getElementById("price").disabled=true
            }
            else
                document.getElementById("price").disabled=false
        }
    </script>
@endsection
