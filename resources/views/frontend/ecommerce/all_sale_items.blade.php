@extends('layouts.main')
@section('title','For Sale and Business')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/plugins/extensions/noui-slider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/css/pages/app-ecommerce-shop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/extensions/nouislider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app-assets/vendors/css/ui/prism.min.css')}}">
@endsection
@section('body_content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Shop</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                    </li>
                                    <li class="breadcrumb-item active">Shop
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detached content-right">
                <div class="content-body">
                    <!-- Ecommerce Content Section Starts -->
                    <section id="ecommerce-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ecommerce-header-items">
                                    <div class="result-toggler">
                                        <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                            <span class="navbar-toggler-icon d-block d-lg-none"><i class="feather icon-menu"></i></span>
                                        </button>
                                       
                                    </div>
                                    <div class="view-options">
                                        <div id="clear-filters">
                                           
                                        </div>
                                        <div class="view-btn-option">
                                            
                                            <button type="button" class="btn btn-primary btn-block my-2" data-toggle="modal" data-target="#composeForm"><i class="feather icon-edit"></i> &nbsp; Add Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Content Section Starts -->
                    <!-- background Overlay when sidebar is shown  starts-->
                    <div class="shop-content-overlay"></div>
                    <!-- background Overlay when sidebar is shown  ends-->

                    <!-- Ecommerce Search Bar Starts -->
                    <section id="ecommerce-searchbar">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <fieldset class="form-group position-relative">
                                    <input type="text" class="form-control search-product" id="iconLeft5" placeholder="Search here">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Search Bar Ends -->

                    <!-- Ecommerce Products Starts -->
                    <section id="ecommerce-products" class="grid-view">
                        <div class="card ecommerce-card">
                            <div class="card-content">
                                <div class="item-img text-center">
                                    <a href="app-ecommerce-details.html">
                                        <img class="img-fluid" src="{{asset('theme/app-assets/images/pages/eCommerce/1.png')}}" alt="img-placeholder"></a>
                                </div>
                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                           
                                        </div>
                                        <div>
                                            <h3 class="item-price"  style="color: #5e50ee !important ">
                                                $39.99
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="item-name" style="font-weight: bold">
                                        <a href="app-ecommerce-details.html" >Camera</a>
                                       
                                    </div>
                                   
                                </div>
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                            <div class="badge badge-primary badge-md">
                                                <span>4</span> <i class="feather icon-star"></i>
                                            </div>
                                        </div>
                                        <div class="item-cost">
                                           
                                        </div>
                                    </div>
                                   
                                    <div class="cart">
                                        <i class="feather icon-shopping-cart"></i> <span class="add-to-cart">View Details</span> <a href="app-ecommerce-checkout.html" class="view-in-cart d-none">View In Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                  
                    </section>
                    <!-- Ecommerce Products Ends -->

                    <!-- Ecommerce Pagination Starts -->
                    <section id="ecommerce-pagination">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-2">
                                        <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                        <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Pagination Ends -->

                </div>
            </div>
            <div class="sidebar-detached sidebar-left">
                <div class="sidebar">
                    <!-- Ecommerce Sidebar Starts -->
                    <div class="sidebar-shop" id="ecommerce-sidebar-toggler">

                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                            </div>
                        </div>
                        <span class="sidebar-close-icon d-block d-md-none">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="card">
                            <div class="card-body">
                                <!-- Categories Starts -->
                                <div id="product-categories">
                                    <div class="product-category-title">
                                        <h6 class="filter-title mb-1">Categories</h6>
                                    </div>
                                    <ul class="list-unstyled categories-list">
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false" checked>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Appliances</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50"> Audio</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Cameras & Camcorders</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Car Electronics & GPS</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Cell Phones</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Computers & Tablets</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50"> Health, Fitness & Beauty</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Office & School Supplies</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">TV & Home Theater</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">Video Games
                                                </span>
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                                <!-- Categories Ends -->
                                <hr>
                                <!-- Clear Filters Starts -->
                                <div id="clear-filters">
                                    <button class="btn btn-block btn-primary">CLEAR ALL FILTERS</button>
                                </div>
                                <!-- Clear Filters Ends -->

                            </div>
                        </div>
                    </div>
                    <!-- Ecommerce Sidebar Ends -->

                </div>
            </div>
        </div>
    </div>
    <form action="" >
    <div  class="modal fade text-left" id="composeForm" tabindex="-1" role="dialog" aria-labelledby="emailCompose" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" >
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-text-bold-600" id="emailCompose">Add Post</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-1">
                    <div class="form-label-group mt-1">
                        <input type="text" id="emailTo" class="form-control" placeholder="Title" name="fname-floating">
                        <label for="emailTo">Title</label>
                    </div>
                    <div>
                    <div class="form-label-group">
                        <input type="text"  class="form-control" placeholder="Price" name="fname-floating">
                        <label for="emailCC">Price</label>
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center ">
                        <div class="text-left">
                            <fieldset class="checkbox">
                                <div class="vs-checkbox-con vs-checkbox-primary">
                                    <input type="checkbox">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="card-link">Free</span>
                                </div>
                            </fieldset>
                        </div>
                       
                    </div>
                     </div>
                    <section class="">
                        
                        <fieldset class="form-label-group">
                            <textarea class="form-control" id="label-textarea" rows="2" placeholder="Description"></textarea>
                            <label for="label-textarea">Label in Textarea</label>
                        </fieldset>
                        
                    </section>
                    <script>
                        $(document).ready(function() {
                        var max_fields      = 3; //maximum input boxes allowed
                        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                        var add_button      = $(".add_field_button"); //Add button ID
                       
                        var x = 1; //initlal text box count
                        
                        
                       $(add_button).click(function(e){ //on add input button click
                            e.preventDefault();
                            if(x < max_fields){ //max input box allowed
                        
                                 //text box increment
                                $(wrapper).append('<div class="custom-file "><input type="file" class="custom-file-input" name="mytext[]"/><label class="custom-file-label" for="emailAttach" name="mytext[]"  >Upload Image</label><a href="#" class="remove_field">Remove</a></div>'); //add input box
                                x++;
                               
                          }
                          
                        });
                       
                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                           
                            e.preventDefault(); 
                            $(this).parent('div').remove(); 
                            x--;
                        })
                    });
                        
                        </script>
                        
                   
                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                        <select class="form-control">
                          
                            <option>Select Category</option>
                            <option value="AD">Andorra</option>
                            <option value="AR">Argentina</option>
                            <option value="AS">American Samoa</option>
                            <option value="AT">Austria</option>
                            <option value="AU">Australia</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BE">Belgium</option>
                        </select>                                                     
                        <div class="form-control-position">
                            <i class="feather icon-user"></i>
                        </div>
                   
                </fieldset>
                   
                    <div  class="form-group mt-2 input_fields_wrap" id="newElementId">
                        <div class="custom-file " >
                            <input type="file" class="custom-file-input" id="emailAttach" >
                            <label class="custom-file-label" for="emailAttach" name="mytext[]"  >Upload Image</label>
                        </div>
                        
                    </div>
                  
                     
                    
                   
                    <button type="button"    class="add_field_button btn mr-1 mb-1 btn-primary btn-sm" style="float: right">Add Another Image</button>
          
               
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Add" class="btn btn-primary">
                    <input type="Reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
</form>

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    
@endsection


@section('scripts')
    <script src="{{asset('theme/app-assets/vendors/js/ui/prism.min.js')}}"></script>
    <script src="{{asset('theme/app-assets/vendors/js/extensions/wNumb.js')}}"></script>
    <script src="{{asset('theme/app-assets/js/scripts/pages/app-ecommerce-shop.js')}}"></script>
    <script src="{{asset('theme/app-assets/vendors/js/extensions/nouislider.min.js')}}"></script>
@endsection
