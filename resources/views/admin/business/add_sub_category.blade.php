@extends('layouts.main')

@section('title','Add Business Sub-category')
@section('body_content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Business Page Category</h2>
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
                                    <h4 class="card-title">Add Sub Category</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if(Session::has('errors'))
                                            <div class="alert alert-danger mb-2" role="alert">
                                                <strong>Error</strong> {{Session::get('errors')->first()}}
                                            </div>
                                        @endif
                                        @if(Session::has('created'))
                                            <div class="alert alert-primary mb-2" role="alert">
                                                <strong>Success</strong> Category Created Successfully
                                            </div>
                                        @endif
                                        <form class="form" action="{{ route('admin.business_sub_categories.store') }}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="category-column" class="form-control"
                                                                   placeholder="Enter Category Title"
                                                                   name="category_title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">

                                                            <select name="parent_id" class="form-control">
                                                                <option value="" selected disabled>Belongs to</option>
                                                                @foreach($parent_categories as $c)
                                                                    <option value="{{$c->id}}">
                                                                        {{$c->b_category_title}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Add
                                                            Category
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
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

