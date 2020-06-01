@extends('layouts.main')
@section('title','User List')
{{--@section('body_content')--}}
{{--    <!-- BEGIN: Content-->--}}
{{--    <div class="app-content content">--}}
{{--        <div class="content-overlay"></div>--}}
{{--        <div class="header-navbar-shadow"></div>--}}
{{--        <div class="content-wrapper">--}}
{{--            <div class="content-header row">--}}
{{--                <div class="content-header-left col-md-9 col-12 mb-2">--}}
{{--                    <div class="row breadcrumbs-top">--}}
{{--                        <div class="col-12">--}}
{{--                            <h2 class="content-header-title float-left mb-0">List View</h2>--}}
{{--                            <div class="breadcrumb-wrapper col-12">--}}
{{--                                <ol class="breadcrumb">--}}
{{--                                    <li class="breadcrumb-item"><a href="index.html">Home</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#">Users</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="breadcrumb-item active">List--}}
{{--                                    </li>--}}
{{--                                </ol>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">--}}
{{--                    <div class="form-group breadcrum-right">--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="content-body">--}}
{{--                <!-- Data list view starts -->--}}
{{--                <section id="data-list-view" class="data-list-view-header">--}}
{{--                    <div class="action-btns d-none">--}}
{{--                        <div class="btn-dropdown mr-1 mb-1">--}}
{{--                            <div class="btn-group dropdown actions-dropodown">--}}
{{--                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    Actions--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu">--}}
{{--                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>--}}
{{--                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>--}}
{{--                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>--}}
{{--                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- DataTable starts -->--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table data-list-view">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th></th>--}}
{{--                                <th>USERNAME</th>--}}
{{--                                @if(isset(auth()->user()->id)&&auth()->user()->admin==1)--}}
{{--                                    <th>EMAIL</th>--}}
{{--                                    <th>POSTAL CODE</th>--}}
{{--                                    <th>ADDRESS</th>--}}
{{--                                @endif--}}
{{--                                <th>CONTACT NUMBER</th>--}}
{{--                                @if(isset(auth()->user()->id)&&auth()->user()->admin==1)--}}
{{--                                    <th>ACTION</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach ($users as $num)--}}
{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td class="product-name">{{$num->name}}</td>--}}
{{--                                    @if(isset(auth()->user()->id)&&auth()->user()->admin==1)--}}
{{--                                        <td class="product-category">{{$num->email}}</td>--}}
{{--                                        <td>--}}
{{--                                            {{$num->postal}}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="chip-text">{{$num->address}}</div>--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
{{--                                    <td class="product-price">{{$num->contact}}</td>--}}
{{--                                    @if(isset(auth()->user()->id)&&auth()->user()->admin==1)--}}
{{--                                        <td class="product-action">--}}
{{--                                            <a href="{{url('/list/{id}'.$num->id)}}"> <span><i--}}
{{--                                                        class="feather icon-trash"></i></span></a>--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}


{{--                            @endforeach--}}

{{--                            </tbody>--}}
{{--                        </table>--}}

{{--                    </div>--}}
{{--                    <!-- DataTable ends -->--}}
{{--                </section>--}}
{{--                <!-- Data list view end -->--}}

{{--            </div>--}}
{{--            {{ $users->links() }}--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- END: Content-->--}}

{{--@endsection--}}
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
                                {{--                                <ol class="breadcrumb">--}}
                                {{--                                    <li class="breadcrumb-item"><a href="#">Home</a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="breadcrumb-item"><a href="#">Data List</a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="breadcrumb-item active">Neighbours--}}
                                {{--                                    </li>--}}
                                {{--                                </ol>--}}
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
                <section id="add-row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover-animation add-rows ">
                                                <thead>
                                                <tr>
                                                    <th>Profile Photo</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Contact</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <th><img width="100" src="{{asset('/').$user->avatar}}" alt=""></th>
                                                        <th>{{$user->name}}</th>
                                                        <th>{{$user->email}}</th>
                                                        <th>{{$user->address}}</th>
                                                        <th>{{$user->contact}}</th>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            let selected=document.getElementsByClassName("selected");
            let Ids=[];
            for(let i=0; i<selected.length;i++)
                Ids.push(selected[i].id)
            $.ajax({
                type:'POST',
                url:'{{route('delete_user')}}',
                data:{ids:Ids},
                success:function(data){
                    for(let x=0;x<Ids.length;x++){
                        console.log(`#${Ids[x]}`)
                        $(`#${Ids[x]}`).fadeOut();
                    }
                },
                error: function (data) {
                    alert(data.responseJSON.message)
                    console.log(data);
                }

            });
        });
        $('.action-delete').on("click", function (e) {
            let selected=document.getElementsByClassName("delete");
            let Ids=[];
            idString=this.id.split("-")
            Ids[0]=idString[idString.length-1];
            $.ajax({
                type:'POST',
                url:'{{route('delete_user')}}',
                data:{ids:Ids,"_token": "{{ csrf_token() }}",},
                success:function(data){
                    if(data.status){
                        e.stopPropagation();
                        $(this).closest('td').parent('tr').fadeOut();
                    }
                },
                error: function (data) {
                    alert(data.responseJSON.message)
                    console.log(data);
                }

            });
        });
    </script>
@endsection
