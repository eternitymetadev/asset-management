@extends('layouts.main')
@section('pageHeading')Create Inventory @endsection

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <form class="general_form" method="POST" action="{{url($prefix.'/inventories')}}" id="createinventory">
        @csrf
        <?php $authuser = Auth::user(); ?>

        <div class="form-row">
            <label style="margin-top: 14px; font-size: 16px; font-weight: 700; color: #000"><strong>Select
                    Asset Type</strong></label>
            <div class="form-group col-md-4">
                <select type="text" class="form-control" name="assettype_id" id="" placeholder="">
                    <option value="">Select</option>
                    <?php 
                            if(count($asset_types)>0) {
                                foreach ($asset_types as $key => $type) {
                            ?>
                    <option value="{{ $key }}">{{ucwords($type)}}</option>
                    <?php 
                                }
                            }
                            ?>
                </select>
            </div>
        </div>

        <div class="statbox widget box box-shadow mb-3" style="padding: 8px 20px 20px;">
            <h5 style="margin-bottom: 10px;">Item Description</h5>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="Name">
                </div>
                <div class="form-group col-md-3">
                    <label>Brand</label>
                    <input type="text" class="form-control" name="brand" id="" placeholder="Brand">
                </div>
                <div class="form-group col-md-3">
                    <label>Model</label>
                    <input type="text" class="form-control" name="model" id="" placeholder="Model">
                </div>

                <div class="form-group col-md-3">
                    <label>Serial No</label>
                    <input type="text" class="form-control" name="serial_no" id="" placeholder="Serial No">
                </div>
            </div>
        </div>

        <div class="statbox widget box box-shadow mb-3">
            <h5 style="margin-bottom: 10px;">Item Purchase information</h5>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Unit</label>
                    <select class="form-control" name="unit">
                        <option value="">Select</option>
                        <option value="SD1">SD1</option>
                        <option value="SD2">SD2</option>
                        <option value="SD3">SD3</option>
                        <option value="SD4">SD4</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Vendor Name</label>
                    <input type="text" class="form-control" name="vendor" id="" placeholder="Vendor">
                </div>
                <div class="form-group col-md-6"></div>
                <div class="form-group col-md-3">
                    <label>Invoice Date</label>
                    <input type="date" class="form-control" name="invoice_date" id="" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label>Invoice No</label>
                    <input type="text" class="form-control" name="invoice_no" id="" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label>Purchase Price</label>
                    <input type="text" class="form-control" name="purchase_price" id="" placeholder="">
                </div>

                <div class="form-group col-md-3">
                    <label>Invoice Image</label>
                    <input type="file" class="form-control invoice_image" name="invoice_image" accept="image/*">
                    <!-- <div class="image_upload mt-2"><img src="{{url("/assets/img/upload-img.png")}}"
                                class="invoiceshow image-fluid" id="img-tag" width="120" height="100"></div> -->
                </div>
            </div>
        </div>


        <div class="statbox widget box box-shadow">
            <h5 style="margin-bottom: 10px;">Item Technical Info</h5>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Processor</label>
                    <input type="text" class="form-control" name="processor" id="" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label>RAM</label>
                    <input type="text" class="form-control" name="ram" id="" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label>SSD</label>
                    <input type="text" class="form-control" name="ssd" id="" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label>HDD</label>
                    <input type="text" class="form-control" name="hdd" id="" placeholder="">
                </div>

                <div class="form-group col-md-3">
                    <label>Maintenace Due Date</label>
                    <input type="date" class="form-control" name="maintenace_due_date" id="" placeholder="">
                </div>
            </div>
        </div>




        <div class="col-12 d-flex align-items-center justify-content-end" style="gap :8px">
            <a class="btn" href="{{url($prefix.'/inventories')}}"> Back</a>
            <button type="submit" class="mt-4 mb-4 btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection

@section('js')
<script>
function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.invoiceshow').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("change", '.invoice_image', function(e) {
    var fileName = this.files[0].name;
    readURL1(this);
});
</script>
@endsection