@extends("layouts.app")
@section("pageTitle")
User List
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
                <a class="btn btn-primary" style="font-size: 15px; padding: 9px; width: 130px"
                    href="{{'users/create'}}">
                    <span>
                        <i class="fa fa-plus"></i>
                        Add New
                    </span>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-4">

                        <div class="main-table table-responsive">
                            @include('users.user-list-ajax')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
</script>
@endsection