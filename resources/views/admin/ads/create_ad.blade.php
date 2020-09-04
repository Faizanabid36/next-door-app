@extends('layouts.main')

@section('title','Create Ad')
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
                                    <li class="breadcrumb-item active"><a href="#">Add Category</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Create New Ad</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if(Session::has('created'))
                                            <div class="alert alert-primary mb-2" role="alert">
                                                <strong>Success</strong> Ad Created Successfully
                                            </div>
                                        @endif
                                        <form class="form" action="{{ route('admin.add_category') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="category-column" class="form-control"
                                                                   placeholder="Enter Heading" name="ad_heading">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="category-column" class="form-control"
                                                                   placeholder="Enter Text" name="ad_text">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">
                                                            Create Ad
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
