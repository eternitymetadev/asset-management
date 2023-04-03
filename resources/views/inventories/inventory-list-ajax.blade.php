<div class="custom-table">
    <table class="table mb-3" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asset Info</th>
                <th>Purchase Info</th>
                <th>Status Info</th>
                <th>Hardware Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="accordion" class="accordion">
            @if(count($inventories)>0)
            @foreach($inventories as $value)
            <tr>
                <td>{{ $value->id ?? "-" }}</td>

                <td>
                    <div class="productInfoBlock">
                        <div class="nameSection">
                            <span>{{ $value->brand ?? "-" }}</span>
                            <span>{{ $value->name ?? "-" }}</span>
                        </div>
                        <div class="infoSection">
                            <span>{{ $value->model ?? "-" }}</span>
                            <span>Sr.: {{ $value->serial_no ?? "-" }}</span>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="purchaseInfoBlock">
                        <span>Purchase for <strong>{{ $value->unit ?? "-" }}</strong></span>
                        <div class="desSection">
                            <span>Date: {{ Helper::ShowDayMonthYear($value->invoice_date) ?? "-" }}</span>
                            <span>Price: {{ $value->purchase_price ?? "-" }}</span>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="statusBlock">
                        <div class="status">{{ Helper::AssetStatus($value->status) ?? "-" }}</div>
                        <div class="desSection">
                            @if($value->assigned_status == 1)Assigned to: {{ $value->name ?? "-" }} @else Not
                            Assigned to anyone @endif
                        </div>
                        <div class="desSection">
                            <span>Maintenance: {{ Helper::MaintenanceStatus($value->maintenance_status) ?? "-" }}</span>
                            <span>Update: {{ Helper::MaintenanceStatus($value->maintenance_status) ?? "-" }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="hardwareBlock">
                        <div>
                            {{ Helper::AssetStatus($value->ram)."GB" ?? "-" }}
                            {{ Helper::AssetStatus($value->ssd) ?? "-" }}
                            {{ Helper::AssetStatus($value->hdd) ?? "-" }}
                        </div>
                    </div>
                </td>
                <td>
                    <a class="dropdown-item singleassetassign" data-toggle="modal" data-target="#singleassign_user"
                        data-assetid="{{$value->id}}"
                        data-name="{{$value->name}}"
                        data-leadtype="{{$value->type}}"><i class="fa fa-user"></i>Assign User</a>
                </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">No Record Found </td>
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
        <nav class="navigation2 text-center" aria-label="Page navigation">
            {{$inventories->appends(request()->query())->links()}}
        </nav>
    </div>
</div>