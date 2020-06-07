@extends('layouts.main')

@section('create-user')
  <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <h3 class="mb-1">
                                            <a class="nav-link d-flex align-items-center active"
                                               id="account-tab" data-toggle="tab" href="#account"
                                               aria-controls="account" role="tab" aria-selected="true">
                                                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Create Public Agent</span>
                                            </a>
                                        </h3>
                                    </li>
                                </ul>
                                @if(Session::has('success'))
                                    <div class="alert alert-primary mb-2" role="alert">
                                        <strong>Success</strong> User Created Successfully
                                    </div>
                                @endif
                                <div class="tab-pane" aria-labelledby="information-tab" role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form class="form" method="POST" action="{{ route('admin.create_agent') }}">
                                        {{ csrf_field() }}
                                        <div class="row mt-1">

                                            <div class="col-12 col-sm-6">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls ">
                                                                <h5 class="mb-1"> <a class=" d-flex " id="account-tab" data-toggle="tab">
                                                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Username</span>
                                                                </a></h5>
                                                                <input type="text" name="name" class="form-control birthdate-picker" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Username" data-validation-required-message="This birthdate field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <h5 class="mb-1"> <a class=" d-flex " id="account-tab" data-toggle="tab">
                                                            <i class="feather icon-mail mr-25"></i><span class="d-none d-sm-block">Email</span>
                                                        </a></h5>
                                                        <input type="text" class="form-control" name="email" placeholder="Email" data-validation-required-message="This mobile number is required" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <h5 class="mb-1"> <a class=" d-flex " id="account-tab" data-toggle="tab">
                                                            <i class="feather icon-unlock mr-25"></i><span class="d-none d-sm-block">Password</span>
                                                        </a></h5>
                                                        <input type="password"  class="form-control" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <h5 class="mb-1"> <a class=" d-flex " id="account-tab" data-toggle="tab">
                                                        <i class="feather icon-users mr-25"></i><span class="d-none d-sm-block">Gender</span>
                                                    </a></h5>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input id="male" type="radio" name="gender" value="0" {{ (old('sex') == 'male') ? 'checked' : '' }} >
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    Male
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input  id="female" type="radio" name="gender" value="1" {{ (old('sex') == 'female') ? 'checked' : '' }}>
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    Female
                                                                </div>
                                                            </fieldset>
                                                        </li>

                                                    </ul>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label>Contact Options</label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" checked name="customCheck1" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1">Email</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" checked name="customCheck2" id="customCheck2">
                                                                    <label class="custom-control-label" for="customCheck2">Message</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="customCheck3" id="customCheck3">
                                                                    <label class="custom-control-label" for="customCheck3">Phone</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div> --}}

                                            </div>
                                            <div class="col-12 col-sm-6">

                                                <div class="form-group">
                                                    <div class="controls">
                                                        <h5 class="mb-1"> <a class=" d-flex " id="account-tab" data-toggle="tab">
                                                            <i class="feather icon-map-pin mr-25"></i><span class="d-none d-sm-block">Address</span>
                                                        </a></h5>

                                                        <input id="address" type="text" class="form-control" name="address" required autocomplete="address" placeholder="Address" data-validation-required-message="This Website field is required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="controls">
                                                        <h5 class="mb-1"> <a class=" d-flex " id="account-tab" data-toggle="tab">
                                                            <i class="feather icon-clipboard mr-25"></i><span class="d-none d-sm-block">Postal Code</span>
                                                        </a></h5>
                                                        <input id="postal" type="number" class="form-control" name="postal" required autocomplete="postal" placeholder="Postal Code" data-validation-required-message="This Postcode field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <h5 class="mb-1"> <a class=" d-flex " id="account-tab" data-toggle="tab">
                                                            <i class="feather icon-phone mr-25"></i><span class="d-none d-sm-block">Contact Number</span>
                                                        </a></h5>
                                                        <input id="contact" type="number" class="form-control" name="contact" required autocomplete="contact" placeholder="Contact Number" data-validation-required-message="This Time Zone field is required">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Create Agent</button>

                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
