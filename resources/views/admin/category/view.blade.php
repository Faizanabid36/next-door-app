@extends('layouts.main')
@section('title','View Categories')
@section('body_content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Category</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Admin Pages</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Category</a>
                                    </li>
                                    <li class="breadcrumb-item active">View Category
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a
                                    class="dropdown-item" href="#">Email</a><a class="dropdown-item"
                                                                               href="#">Calendar</a></div>
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
                                    <form class="form" action="{{route('edit_category')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-label-group">
                                                        <input type="hidden" id="category-column-id" name="id">
                                                        <input type="text" id="category-column" class="form-control" placeholder="Enter Category Name" name="name">
                                                        {{-- <label for="first-name-column">First Name</label> --}}
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
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                            </div>
                        </div>

                        <div class="card-body">

                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cat as $num)
                                        <tr>
                                            <td id="category-{{$num->id}}">{{$num->name}}</td>
                                            <td>
                                                <span class="" onclick="openEdit({{$num}})">
                                                    <i class="feather icon-edit"></i>
                                                </span>
                                                <a href="{{url('view_category/delete_category/'.$num->id)}}">
                                                    <span
                                                        id="delete-item-" class="action-delete">
                                                        <i class="feather icon-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
            $('#category-column').val(category.name)
            $('#category-column-id').val(category.id)
        }

        // $('.action-edit').on("click",function(e,category){
        //     e.stopPropagation();
        //     $('#data-name').val('Altec Lansing - Bluetooth Speaker');
        //     $('#data-price').val('$99');
        //     $(".add-new-data").addClass("show");
        //     $(".overlay-bg").addClass("show");
        // });
    </script>
@endsection
