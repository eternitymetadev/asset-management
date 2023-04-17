@extends("layouts.app")
@section("pageTitle")
Inventory List
@endsection


@section("style")

@endsection



@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="search-inp w-50">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" id="search"
                            data-action="<?php echo url()->current(); ?>">
                    </div>
                </form>
            </div>
            <div class="ms-auto">

                <a href="<?php echo URL::to($prefix.'/'.$segment.'/export/excel'); ?>"
                    class="btn btn-primary" download><span><i class="fa fa-download"></i> Export</span></a>
                <a class="btn btn-primary" style="font-size: 15px; padding: 9px; width: 130px"
                    href="{{'inventories/create'}}">
                    <span>
                        <i class="fa fa-plus"></i>
                        Add New
                    </span>
                </a>
                <a href="javascript:void(0)" class="btn btn-primary reset_filter" style="font-size: 15px; padding: 9px;"
                    data-action="<?php echo url()->current(); ?>"><span><i class="fa fa-refresh"></i> Reset
                        Filters</span></a>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-4">

                        <div class="main-table table-responsive">
                            @include('inventories.inventory-list-ajax')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('models.assign-user')
@include('models.showassign-asset')
@endsection

@section('script')
<script>
jQuery(function() {
    $('.my-select2').each(function() {
        $(this).select2({
            theme: "bootstrap-5",
            dropdownParent: $(this).parent(), // fix select2 search input focus bug
        })
    })
    // fix select2 bootstrap modal scroll bug
    $(document).on('select2:close', '.my-select2', function(e) {
        var evt = "scroll.select2"
        $(e.target).parents().off(evt)
        $(window).off(evt)
    })

})

// list export in excel 

jQuery(document).on('click', '.inventoryListExs', function(event) {
    event.preventDefault();

    var totalcount = jQuery('.totalcount').text();
    if (totalcount > 30000) {
        jQuery('.limitmessage').show();
        setTimeout(function() {
            jQuery('.limitmessage').fadeOut();
        }, 5000);
        return false;
    }

    var url = jQuery(this).attr('data-action');
alert(url);
    jQuery.ajax({
        url: url,
        type: 'get',
        cache: false,
        data: '',
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="_token"]').attr('content')
        },
        processData: true,
        beforeSend: function() {
            //jQuery(".load-main").show();
        },
        complete: function() {
            //jQuery(".load-main").hide();
        },
        success: function(response) {
            // jQuery(".load-main").hide();
            setTimeout(() => {
                window.location.href = geturl
            }, 10);
        }
    });
});
</script>
@endsection