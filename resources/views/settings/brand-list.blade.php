@extends("layouts.app")
@section("pageTitle")
Brand List
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
                <a href="javascript:void(0)" class="btn btn-primary reset_filter"
                    style="font-size: 15px; padding: 9px;" data-action="<?php echo url()->current(); ?>"><span><i class="fa fa-refresh"></i> Reset Filters</span></a>
                <a class="btn btn-primary" style="font-size: 15px; padding: 9px; width: 130px"
                    href="{{'settings/add-brand'}}" data-bs-toggle="modal" data-bs-target="#addBrandModal">
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
                            @include('settings.brand-list-ajax')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content general_form" method="POST" action="{{url($prefix.'/settings/add-brand')}}"
            id="createbrand">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Create Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
<script>

</script>
@endsection