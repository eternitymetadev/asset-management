@extends("layouts.app")
@section("pageTitle")
Create Inventory
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
                        <form class="row g-3 general_form" method="POST" action="{{url($prefix.'/inventories')}}"
                            id="createinventory">
                            @csrf
                            <?php $authuser = Auth::user(); ?>

                            <div class="card-title d-flex align-items-center">
                                <span class="mb-0 subTitle">Item Description</span>
                            </div>
                            <hr />

                            <div class="col-12" style="background: #008cff20; border-radius: 8px; overflow: hidden">
                                <table id="itemTable" class="table mb-3" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th style="width: 150px">Category</th>
                                            <th style="width: 150px">Brand</th>
                                            <th>Model</th>
                                            <th>Unit Price</th>
                                            <th>Image</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><input class="form-control" name="data[0][sno]" /></td>
                                            <td>
                                                <select type="text" class="form-select" name="data[0][category_id]"
                                                    id="">
                                                    <option value="">Choose...</option>
                                                    <?php 
                                                    if(count($categories)>0) {
                                                        foreach ($categories as $key => $value) {
                                                    ?>
                                                    <option value="{{ $key }}">{{ucwords($value)}}</option>
                                                    <?php 
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select type="text" class="form-select" name="data[0][brand_id]">
                                                    <option value="">Choose...</option>
                                                    <?php 
                                                    if(count($brands)>0) {
                                                        foreach ($brands as $key => $value) {
                                                    ?>
                                                    <option value="{{ $key }}">{{ucwords($value)}}</option>
                                                    <?php 
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input class="form-control" name="data[0][model]" /></td>
                                            <td><input class="form-control" name="data[0][unit_price]" /></td>
                                            <td>
                                                <input type="file" class="form-control invoice_image"
                                                    name="data[0][invc_image]" accept="image/*">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12" style="text-align: right">
                                <span id="add" onclick="appendItemRow()">Add Item</span>
                            </div>

                            <div class="card-title d-flex align-items-center">
                                <span class="mb-0 subTitle">Item Purchase information</span>
                            </div>
                            <hr />
                            <div class="col-md-3">
                                <label for="" class="form-label">Bill to Unit</label>
                                <select type="text" class="form-select" name="unit_id" id="">
                                    <option value="">Choose...</option>
                                    <?php 
                                        if(count($units)>0) {
                                            foreach ($units as $key => $value) {
                                        ?>
                                    <option value="{{ $key }}">{{ucwords($value)}}</option>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Vendor Name</label>
                                <input type="text" class="form-control" name="vendor_id" id="">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Invoice No</label>
                                <input type="text" class="form-control" name="invoice_no" id="">
                            </div>

                            <div class="col-md-3">
                                <label for="" class="form-label">Invoice Date</label>
                                <input type="date" class="form-control" name="invoice_date" id="">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Invoice Price</label>
                                <input type="text" class="form-control" name="invoice_price" id="">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">No of Items</label>
                                <input type="text" class="form-control" name="invcitem_no" id="">
                            </div>

                            <div class="col-md-3">
                                <div class="form-check">
                                    <label class="form-label" for="">Invoice Image</label>
                                    <input type="file" class="form-control invoice_image" name="invoice_image"
                                        accept="image/*">
                                </div>
                            </div>


                            <div class="col-12">
                                <a class="btn" href="{{url($prefix.'/inventories')}}"> Back</a>
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section("script")
        <script>
        // for append items in table
        const appendItemRow = () => {
            let node = ``;
            let i = 1;
            node += `<tr>
                        <td><input class="form-control" name="data[` + i + `][sno]"/></td>
                        <td><select type="text" class="form-select" name="data[` + i + `][category_id]">
                                                    <option value="">Choose...</option>
                                                    @if(count($categories)>0) 
                                                        @foreach ($categories as $key => $value)
                                                    <option value="{{$key}}">{{ucwords($value)}}</option>
                                                    @endforeach
                                                    @endif
                                                </select></td>
                        <td><select type="text" class="form-select" name="data[` + i + `][brand_id]">
                                                    <option value="">Choose...</option>
                                                    @if(count($brands)>0)
                                                        @foreach ($brands as $key => $value)
                                                    <option value="{{$key}}">{{ucwords($value)}}</option>
                                                    @endforeach
                                                    @endif
                                                </select></td>
                        <td><input class="form-control" name="data[` + i + `][model]"/></td>
                        <td><input class="form-control" name="data[` + i + `][unit_price]"/></td>
                        <td><input type="file" class="form-control invoice_image" name="data[` + i + `][invc_image]" accept="image/*"></td>
                        <td><span class="removeItem">-</span></td>
                    </tr>`;
            $('#itemTable').append(node);
        }

        $("#itemTable").on('click', '.removeItem', function() {

            $(this).closest('tr').remove();
        });


        $('#datepicker').datepicker({
            uilibrary: 'bootstrap4',
            format: 'dd-mmm-yyyy',
            maxDate: new Date()
        });

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