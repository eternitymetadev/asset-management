@extends("layouts.app")
@section("pageTitle")
Create User
@endsection


@section("style")

@endsection

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ms-auto">
                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div> -->
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-4">
                        <form class="row g-3 general_form" method="POST" action="{{url($prefix.'/users')}}"
                            id="createuser">
                            @csrf
                            <?php $authuser = Auth::user(); ?>

                            <div class="col-md-4">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="">
                                
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Login ID</label>
                                <input type="text" class="form-control" name="login_id" id="">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>

                            <div class="col-md-3">
                                <label for="" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" class="form-control mbCheckNm" name="phone" id="phone" placeholder=""
                            maxlength="10">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Select Role</label>
                                <select name="role_id" class="form-control" id="role_id">
                                    <option value="">Select</option>
                                    <?php 
                                            if(count($getroles)>0) {
                                                foreach ($getroles as $key => $getrole) {  
                                            ?>
                                    <option value="{{ $getrole->id }}">{{ucwords($getrole->name)}}</option>
                                    <?php 
                                            }
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-label" for="">Select Location</label>
                                    <select class="form-control" id="" name="location_id">
                                        <option value="">Select</option>
                                        <?php 
                                            if(count($locations)>0) {
                                                foreach ($locations as $key => $location) {
                                            ?>
                                        <option value="{{ $key }}">{{ucwords($location)}}</option>
                                        <?php 
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-4 col-md-12">
                                <hr class="brown-border">
                                <h4 class="mt-3 mb-3">Permissions</h4>
                                <div class="d-flex align-items-center" style="gap: 8px">
                                    <div class="checkbox selectAll">
                                        <label class="check-label d-flex align-items-center" style="gap: 4px">
                                            <input id="ckbCheckAll" type="checkbox">
                                            <span class="checkmark"></span>
                                            All
                                        </label>
                                    </div>
                                    <div class="permis d-flex align-items-center" style="gap: 8px">
                                        <?php 
                                                if(count($getpermissions)>0) {
                                                    foreach ($getpermissions as $key => $getpermission) {  
                                                ?>
                                        <div class="checkbox">
                                            <label class="check-label d-flex align-items-center" style="gap: 4px">
                                                <input type="checkbox" name="permisssion_id[]" value="{{ $getpermission->id }}"
                                                    class="chkBoxClass">
                                                <span class="checkmark"></span>
                                                {{ucfirst($getpermission->name)}}
                                            </label>
                                        </div>
                                        <?php 
                                                    }
                                                }
                                                ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <a class="btn" href="{{url($prefix.'/users')}}"> Back</a>
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section("script")
        
        @endsection