@extends('layouts.main')
@section('title','User List')
@section('body_content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Neighbours List</h2>
                            <div class="breadcrumb-wrapper col-12">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-settings"></i>
                            </button>
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
                    <div class=" d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button"
                                        class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item bulk-delete" href="#"><i class="feather icon-trash"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th></th>
                                <th>PROFILE IMAGE</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>ADDRESS</th>

                                <th>CONTACT NUMBER</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr id="{{$user->id}}">
                                    <td></td>
                                    <td class="product-img"><img src="{{asset('/').$user->avatar}}"
                                                                 alt="Img placeholder">
                                    </td>
                                    <td class="product-name">{{$user->name}}</td>
                                    <td class="product-category">{{$user->email}}</td>
                                    <td>{{$user->address}}</td>
                                    {{-- <td> --}}
                                    {{--                                        <div class="chip chip-warning">--}}
                                    {{--                                            <div class="chip-body">--}}
                                    {{--                                                <div class="chip-text">on hold</div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{-- </td> --}}
                                    <td class="product-price">{{$user->contact}}</td>
                                    <td class="product-action">
                                        {{-- <span class="action-edit"><i class="feather icon-edit btn btn-primary mr-1 mb-1"></i></span> --}}
                                        <span id="delete-item-{{$user->id}}" class="action-delete btn btn-danger mr-1 mb-1"><i class="feather icon-trash"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">Thumb View Data</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-category"> Category </label>
                                            <select class="form-control" id="data-category">
                                                <option>Audio</option>
                                                <option>Computers</option>
                                                <option>Fitness</option>
                                                <option>Appliance</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-status">Order Status</label>
                                            <select class="form-control" id="data-status">
                                                <option>Pending</option>
                                                <option>Canceled</option>
                                                <option>Delivered</option>
                                                <option>On Hold</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-price">Price</label>
                                            <input type="text" class="form-control" id="data-price">
                                        </div>
                                        <div class="col-sm-12 data-field-col data-list-upload">
                                            <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                                <div class="dz-message">Upload Image</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
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

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
@section('footer_scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.bulk-delete').on("click", function (e) {
            let selected = document.getElementsByClassName("selected");
            let Ids = [];
            if(selected.length<=0){
                toastr.error('No Data Selected', 'Invalid Selection!', { "timeOut": 5000 });
                return false;
            }
            for (let i = 0; i < selected.length; i++)
                Ids.push(selected[i].id)
            $.ajax({
                type: 'POST',
                url: '{{route('delete_user')}}',
                data:{ids:Ids},
                success:function(data){
                    for(let x=0;x<Ids.length;x++){
                        console.log(`#${Ids[x]}`)
                        $(`#${Ids[x]}`).fadeOut();
                        toastr.success('User Deleted Successfully', 'Success', {
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            timeOut: 2000
                        });
                    }
                },
                error: function (data) {
                    toastr.error(data.responseJSON.message, 'Timeout!', { "timeOut": 5000 });
                    console.log(data);
                }
            });
        });
        $('.action-delete').on("click", function (e) {
            let Ids=[];
            console.log(this)
            idString=this.id.split("-")
            Ids[0]=idString[idString.length-1];
            $.ajax({
                type:'POST',
                url:'{{route('delete_user')}}',
                data:{ids:Ids,"_token": "{{ csrf_token() }}",},
                success:function(data){
                    e.stopPropagation();
                    $(`#${Ids[0]}`).fadeOut();
                    toastr.success('User Deleted Successfully', 'Deleted', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        timeOut: 2000
                    });
                    // $(this).closest('td').parent('tr').fadeOut();
                },
                error: function (data) {
                    toastr.error(data.responseJSON.message, 'Timeout!', { "timeOut": 5000 });
                    console.log(data);
                }

            });
        });
    </script>
@endsection
