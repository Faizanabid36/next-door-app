@extends('layouts.main')
@section('title','View Sub Categories')
@section('body_content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Business Page Categories</h2>
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
                                    <h4 class="text-uppercase">Edit Category</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.business_sub_categories.update')}}" method="POST" >
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-label-group">
                                                        <input type="hidden" id="category-column-id" name="id">
                                                        <input type="text" id="category-column" class="form-control"
                                                               placeholder="Enter Category Name"
                                                               name="b_category_title">
                                                        <select class="form-control" name="parent_id" id="category-column-option">
                                                            <option value="" selected disabled>Select Parent</option>
                                                            @foreach($parents as $p)
                                                                <option value="{{$p->id}}">{{$p->b_category_title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Update
                                                        Category
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
                                        <th>Name</th>
                                        <th>Belongs to</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sub_categories as $num)
                                        <tr>
                                            <td id="category-{{$num->id}}">{{$num->b_category_title}}</td>
                                            <td>
                                            {{$num->parent->b_category_title}}
                                            </td>
                                            <td>
                                                <form action="{{route('admin.business_sub_categories.delete')}}"
                                                      method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$num->id}}">
                                                    <span class="" onclick="openEdit({{$num}})">
                                                        <i class="feather icon-edit"></i>
                                                    </span>
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
        function openEdit(category) {
            $(".add-new-data").addClass("show");
            $(".overlay-bg").addClass("show");
            $('#category-column').val(category.b_category_title);
            // $('#category-column-option').setOption(category.parent.b_category_title);
            $('#category-column-id').val(category.id)
        }
    </script>
@endsection
