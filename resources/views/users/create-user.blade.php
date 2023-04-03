@extends('layouts.main')
@section('pageHeading')Create User @endsection

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <form class="general_form form-row" method="POST" action="{{url($prefix.'/users')}}" id="createuser">

                    <div class="form-group mb-4 col-md-6">
                        <label for="exampleFormControlInput2">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="exampleFormControlInput2">Login ID<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="login_id" id="login_id" placeholder="Login ID">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="exampleFormControlInput2">Email Address<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="exampleFormControlInput2">Password<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="exampleFormControlInput2">Phone</label>
                        <input type="text" class="form-control mbCheckNm" name="phone" id="phone" placeholder=""
                            maxlength="10">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="exampleFormControlSelect1">Select Role</label>
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
                    <div class="form-group mb-4 col-md-6">
                        <label for="exampleFormControlSelect1">Select Location</label>
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


                    <div class="col-12 d-flex align-items-center justify-content-end" style="gap :8px">
                        <a class="btn" href="{{url($prefix.'/users') }}"> Back</a>
                        <button type="submit" class="mt-4 mb-4 btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
//multiple select //
var ss = $(".basic").select2({
    tags: true,
});
//
</script>
@endsection