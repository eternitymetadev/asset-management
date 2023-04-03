<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\AssetType;
use App\Models\InventoryHistory;
use App\Models\User;
use Validator;
use Helper;
use Config;
use Storage;
use Session;
use DB;
use URL;
use Auth;
use Crypt;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->title = "Inventories";
        $this->segment = \Request::segment(2);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $peritem = Config::get('variable.PER_PAGE');
        $query = Inventory::query();

        if ($request->ajax()) {
            $query = $query;

            if(isset($request->singleuser)){
                Inventory::where('id',$request->assetid)->update(['assigned_to'=>$request->singleleaduser,'assigned_status'=>1]);
            }

            if (!empty($request->search)) {
                $search = $request->search;
                $searchT = str_replace("'", "", $search);
                $query->where(function ($query) use ($search, $searchT) {
                    $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%')
                    ->orWhere('brand', 'like', '%' . $search . '%')
                    ->orWhere('unit', 'like', '%' . $search . '%');
                        
                });
            }
            if ($request->peritem) {
                Session::put('peritem', $request->peritem);
            }

            $peritem = Session::get('peritem');
            if (!empty($peritem)) {
                $peritem = $peritem;
            } else {
                $peritem = Config::get('variable.PER_PAGE');
            }
            $users = User::select('id','name','role_id')->where('status','1')->get();

            $inventories = $query->orderBy('id', 'DESC')->paginate($peritem);
            $inventories = $inventories->appends($request->query());

            $html = view('inventories.inventory-list-ajax', ['prefix' => $this->prefix, 'peritem' => $peritem, 'inventories' => $inventories, 'users'=>$users,])->render();

            return response()->json(['html' => $html]);
        }
        $users = User::select('id','name','role_id')->where('status','1')->get();
         
        $inventories = $query->orderBy('id', 'DESC')->paginate($peritem);
        $inventories = $inventories->appends($request->query());

        return view('inventories.inventory-list', ['prefix' => $this->prefix, 'segment' => $this->segment, 'peritem' => $peritem, 'inventories' => $inventories,'users'=>$users,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->prefix = request()->route()->getPrefix();
        $locations = Helper::getLocations();
        $asset_types = Helper::getAssettypes();

        return view('inventories.create-inventory', ['prefix' => $this->prefix, 'segment' => $this->segment, 'locations' => $locations, 'asset_types' => $asset_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $rules = array(
            // 'name'    => 'required|unique:locations',
        );
        $validator = Validator::make($request->all() , $rules);
        if ($validator->fails())
        {
            // $a['name']  = "This name already exists";
            $errors                 = $validator->errors();
            $response['success']    = false;
            $response['validation'] = false;
            $response['formErrors'] = true;
            $response['errors']     = $errors;
            return response()->json($response);
        }
        $authuser = Auth::user();

        if(!empty($request->assettype_id)){
            $addinventory['assettype_id'] = $request->assettype_id;
        }

        if(!empty($request->name)){
            $addinventory['name'] = $request->name;
        }
        if(!empty($request->brand)){
            $addinventory['brand'] = $request->brand;
        }
        if(!empty($request->model)){
            $addinventory['model'] = $request->model;
        }
        if(!empty($request->serial_no)){
            $addinventory['serial_no'] = $request->serial_no;
        }        
        if(!empty($request->unit)){
            $addinventory['unit'] = $request->unit;
        }       
        if(!empty($request->invoice_date)){
            $addinventory['invoice_date'] = $request->invoice_date;
        } 
        if(!empty($request->invoice_no)){
            $addinventory['invoice_no'] = $request->invoice_no;
        }
        if(!empty($request->vendor)){
            $addinventory['vendor'] = $request->vendor;
        }
        if(!empty($request->purchase_price)){
            $addinventory['purchase_price'] = $request->purchase_price;
        }
        if(!empty($request->processor)){
            $addinventory['processor'] = $request->processor;
        }
        if(!empty($request->ram)){
            $addinventory['ram'] = $request->ram;
        }
        if(!empty($request->ssd)){
            $addinventory['ssd'] = $request->ssd;
        }
        if(!empty($request->hdd)){
            $addinventory['hdd'] = $request->hdd;
        }
        if(!empty($request->maintenace_due_date)){
            $addinventory['maintenace_due_date'] = $request->maintenace_due_date;
        }
        if(!empty($request->last_maintenace_date)){
            $addinventory['last_maintenace_date'] = $request->last_maintenace_date;
        }
        
        $addinventory['created_user_id'] = $authuser->id;
        $addinventory['status'] = 1;
        $addinventory['assigned_status'] = 1;
        $addinventory['maintenance_status'] = 1;
        // $addinventory['upgrade_status'] = 1;
        // upload rc image
        if($request->invoice_image){
            $file = $request->file('invoice_image');
            $path = 'public/images/inventory_invoice_images';
            $name = Helper::uploadImage($file,$path);
            $addinventory['invoice_image']  = $name;
        }

        $saveinventory = Inventory::create($addinventory);
        if($saveinventory){
            $addinventory['inventory_id'] = $saveinventory->id;
            $save_inv_history = InventoryHistory::create($addinventory);
            
            $response['success']    = true;
            $response['page']       = 'inventory-create';
            $response['error']      = false;
            $response['success_message'] = "Inventory created successfully";
            $response['redirect_url'] = URL::to($this->prefix.'/inventories');
        }else{
            $response['success']       = false;
            $response['error']         = true;
            $response['error_message'] = "Can not created inventory please try again";
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
