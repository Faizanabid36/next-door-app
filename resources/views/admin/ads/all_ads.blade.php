@extends('layouts.main')
@section('title','Manage Ads')
@section('body_content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Manage Ads</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">Edit Ads</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="{{route('ads.update_ad')}}" method="POST"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-label-group">
                                                        <input type="hidden" id="category-column-id" name="id">
                                                        <input type="text" id="category-column" class="form-control"
                                                               placeholder="Enter Ad Heading"
                                                               name="ad_heading">
                                                        <input type="text" id="category-column2" class="form-control"
                                                               placeholder="Enter Ad Text"
                                                               name="ad_text">
                                                        <input type="text" id="category-column3" class="form-control"
                                                               placeholder="Post in neighbourhood"
                                                               name="visible_to_neighbourhood">
                                                        <input type="text" id="category-column4" class="form-control"
                                                               placeholder="Visibility Duration"
                                                               name="hide_after">

                                                        <input type="file" id="category-column5"
                                                               class="form-control mt-4" name="Picture">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Update
                                                        Ad
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            @if(Session::has('deleted'))
                                <div class="alert alert-primary mb-2" role="alert">
                                    <strong>Success</strong> Category Deleted Successfully
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger mb-2" role="alert">
                                    <strong>Error</strong> This Category has Sub-categories. Delete Sub-categories First
                                </div>
                            @endif
                            @if(Session::has('updated'))
                                <div class="alert alert-primary mb-2" role="alert">
                                    <strong>Success</strong> Category Updated Successfully
                                </div>
                        @endif
                        <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Heading</th>
                                        <th>Text</th>
                                        <th>Posted in neighbourhood</th>
                                        <th>Posted for days</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($ads as $ad)
                                        <tr>
                                            <td>
                                                <img width="50" src="{{$ad->ad_media}}" alt="">
                                            </td>
                                            <td id="category-{{$ad->id}}">{{$ad->ad_heading}}</td>
                                            <td id="category-text-{{$ad->id}}">{{$ad->ad_text}}</td>
                                            <td id="category-visibility-{{$ad->id}}">{{$ad->visible_to_neighbourhood}}</td>
                                            <td id="category-duration-{{$ad->id}}">{{$ad->hide_after}}</td>
                                            <td>
                                                <form action="{{route('ads.destroy',$ad->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    <span class="" onclick="openEdit({{$ad}})">
                                                        <i class="feather icon-edit"></i>
                                                    </span>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="Delete" class="btn btn-danger"/>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->



@endsection
@section('footer_scripts')
    <script>
        function openEdit(ad) {
            $(".add-new-data").addClass("show");
            $(".overlay-bg").addClass("show");
            $('#category-column').val(ad.ad_heading);
            $('#category-column2').val(ad.ad_text);
            $('#category-column3').val(ad.visible_to_neighbourhood);
            $('#category-column4').val(ad.hide_after);
            $('#category-column-id').val(ad.id)
        }
    </script>
@endsection
