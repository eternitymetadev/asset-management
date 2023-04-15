<div class="custom-table">
    <table class="table mb-3" style="width:100%">
        <thead>
            <tr>
                <th>UN ID</th>
                <th>Sr No</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Unit Price</th>
                <th>Bill TO Unit</th>
                <th>Vendor</th>
                <th>Invoice No</th>
                <th>Invoice Date</th>
                <th>Invoice Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="accordion" class="accordion">
            @if(count($inventories)>0)
            @foreach($inventories as $value)
            <tr>
                <td>FRC-{{ $value->un_id ?? "-" }}</td>
                <td>{{ $value->sno ?? "-" }}</td>
                <td>{{ $value->Category->name ?? "-" }}</td>
                <td>{{ $value->brand_id ?? "-" }}</td>
                <td>{{ $value->model ?? "-" }} </td>
                <td>{{ $value->unit_price ?? "-" }}</td>
                <td>{{ $value->Inventories->Unit->name ?? "-" }}</td>
                <td>{{ $value->Inventories->vendor_id ?? "-" }}</td>
                <td>{{ $value->Inventories->invoice_no ?? "-" }}</td>
                <td>{{ Helper::ShowDayMonthYear($value->Inventories->invoice_date) ?? "-" }}</td>
                <td>{{ $value->Inventories->invoice_price ?? "-" }}</td>
                <td>{{ Helper::AssetInvcStatus($value->status) ?? "-" }}</td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="11" class="text-center">No Record Found </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-8 col-xl-9">
            </div>
            <div class="col-md-12 col-lg-4 col-xl-3">
                <div class="form-group mt-3 brown-select">
                    <div class="row">
                        <div class="col-md-6 pr-0">
                            <label class=" mb-0">items per page</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control perpage" data-action="<?php echo url()->current(); ?>">
                                <option value="10" {{$peritem == '10' ? 'selected' : ''}}>10</option>
                                <option value="50" {{$peritem == '50' ? 'selected' : ''}}>50</option>
                                <option value="100" {{$peritem == '100'? 'selected' : ''}}>100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ml-auto mr-auto">
        <nav class="navigati text-center" aria-label="Page navigation">
            {{$inventories->appends(request()->query())->links()}}
        </nav>
    </div>
</div>