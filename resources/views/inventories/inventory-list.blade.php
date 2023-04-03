@extends('layouts.main')
@section('pageHeading')Inventory List @endsection

@section('content')


<style>
.statusBlock {
    background: #f3f3f3;
    padding: 9px 4px;
    border-radius: 4px;
}

.statusBlock .status {
    background: honeydew;
    color: green;
    font-weight: bold;
    width: 120px;
    text-align: center;
    border-radius: 6px;
    margin-top: -16px;
    margin-inline: auto;
    border: 2px solid;
}

.statusBlock .desSection {
    text-align: center;
    font-weight: 700;
}
</style>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="mb-4 mt-4">
            <div class="container-fluid">
                <div class="row winery_row_n spaceing_2n mb-3">
                    <div class="col d-flex pr-0">
                        <div class="search-inp w-100">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" id="search"
                                        data-action="<?php echo url()->current(); ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg lead_bladebtop1_n pl-0">
                        <div class="winery_btn_n btn-section px-0 text-right">
                            <a class="btn-primary btn-cstm btn ml-2" style="font-size: 15px; padding: 9px; width: 130px"
                                href="{{'inventories/create'}}"><span><i class="fa fa-plus"></i> Add New</span></a>
                            <!-- <a href="javascript:void(0)" class="btn btn-primary btn-cstm reset_filter ml-2" style="font-size: 15px; padding: 9px;" data-action="<?php //echo url()->current(); ?>"><span><i class="fa fa-refresh"></i> Reset Filters</span></a>

                                    <a href="<?php //echo URL::to($prefix . '/' . $segment . '/export/excel'); ?>" class="btn btn-primary btn-cstm downloadEx ml-2" style="font-size: 15px; padding: 9px;" data-action="<?php //echo URL::to($prefix . '/' . $segment . '/export/excel'); ?>" download><span>
                                    <i class="fa fa-download"></i> Export</span></a> -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="main-table table-responsive">
                @include('inventories.inventory-list-ajax')
            </div>
        </div>
    </div>
</div>

@include('models.assign-user')
@include('models.showassign-asset')
@endsection

@section('js')
<script>
jQuery(function () {
        $('.my-select2').each(function () {
            $(this).select2({
                theme: "bootstrap-5",
                dropdownParent: $(this).parent(), // fix select2 search input focus bug
            })
        })
        // fix select2 bootstrap modal scroll bug
        $(document).on('select2:close', '.my-select2', function (e) {
            var evt = "scroll.select2"
            $(e.target).parents().off(evt)
            $(window).off(evt)
        })
    })
</script>
@endsection
