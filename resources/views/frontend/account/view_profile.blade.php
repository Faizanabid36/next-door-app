@extends('layouts.main')

@section('view_profile')

 <!-- BEGIN: Content-->
 <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- page users view start -->
        
        <!-- page users view end -->
        <section id="knowledge-base-content">
            <div class="row search-content-info">
                <div class="col-md-12 col-sm-6 col-12 search-content">
                    <div class="card" style="background-image: ">
                        <div class="card-body text-center">
                            
                                <img src="{{asset(auth()->user()->avatar)}}" class="mx-auto mb-2 round" width="180" alt="knowledge-base-image">
                                <h2><i class="feather icon-user"></i><span style="font-weight: bold">{{$profile->name}}</span> </h2>
                                <a href="app-user-edit.html" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                        <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Delete</button>
                                {{-- <small class="text-dark">Muffin lemon drops chocolate carrot cake chocolate bar sweet roll.</small> --}}
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
            <section class="page-users-view">
                <div class="row">
                    <!-- account start -->
                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header ">
                                <div class="card-title">PROFILE</div>
                            </div>
                            <div class="card-body">
                                <div class="row " >
                                    <div class="users-view-image ">
                                        <img src="{{asset(auth()->user()->avatar)}}" class="  round mb-2 pr-2 ml-1 " height="170" width="190" alt="avatar" >
                                    </div>
                                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                        <table>
                                            <tr>
                                                <td class="font-weight-bold "><i class="feather icon-user"></i>Username</td>
                                                <td> &nbsp; {{$profile->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Name</td>
                                                <td>Angelo Sashington</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Email</td>
                                                <td>angelo@sashington.com</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-5">
                                        <table class="ml-0 ml-sm-0 ml-lg-0">
                                            <tr>
                                                <td class="font-weight-bold">Status</td>
                                                <td>active</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Role</td>
                                                <td>admin</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Company</td>
                                                <td>WinDon Technologies Pvt Ltd</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <a href="app-user-edit.html" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                        <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- account end --> --}}
                    <!-- information start -->
                    <div class="col-md-12    col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title mb-2">Information</div>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td class="font-weight-bold">Birth Date </td>
                                        <td>28 January 1998
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Mobile</td>
                                        <td>+65958951757</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Website</td>
                                        <td>https://rowboat.com/insititious/Angelo
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Languages</td>
                                        <td>English, Arabic
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Gender</td>
                                        <td>female</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Contact</td>
                                        <td>email, message, phone
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- information start -->
                    
                    
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->


    
@endsection