<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //return view from sidebar
    public function viewManageAssetPage()
    {
        $assets = DB::table('assets')->get();

        return view('admin.manageAsset')->with('assets', $assets);
    }

    public function viewManageAssetReportPage()
    {
        $asset = DB::table('assets')->get();

        return view('admin.manageAsset-report')->with('asset', $asset);
    }

    public function viewManageVehiclePage()
    {
        $vehicles = DB::table('vehicles')->get();

        return view('admin.manageVehicle')->with('vehicles', $vehicles);
    }

    public function AdminAddAsset(Request $request)
    {
        $data = new Asset();
        $data->asset_no = $request->asset_no;
        $data->service = $request->service;
        $data->asset_class = $request->asset_class;
        $data->type_code = $request->type_code;
        $data->type_name = $request->type_name;
        $data->task_code = $request->task_code;
        $data->taskcode_3 = $request->taskcode_3;
        $data->frequency = $request->frequency;
        $data->desc = $request->desc;
        $data->item_code= $request->item_code;
        $data->item_name = $request->item_name;
        $data->category = $request->category;
        $data->model = $request->model;
        $data->serial_no = $request->serial_no;
        $data->manufacturer = $request->manufacturer;
        $data->dept = $request->dept;
        $data->depart_name = $request->depart_name;
        $data->area_code = $request->area_code;
        $data->area_name = $request->area_name;
        $data->location_code = $request->location_code;
        $data->location_name = $request->location_name;
        $data->remark = $request->remark;
        $data->purc_cost = $request->purc_cost;
        $data->work_group = $request->work_group;
        $data->group = $request->group;
        $data->package = $request->package;
        $data->package_desc = $request->package_desc;
        $data->vendor_id = $request->vendor_id;
        $data->branch_id = $request->branch_id;
        $data->createdate = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');
        $data->createby = $request->createby;

        $data->save();

        return redirect('/admin/manageAsset')->with('success', 'New asset has been successfully added');

    }

    //Show asset report page 
    public function AssetReportPage($asset_no)
    {
        $asset = DB::table('assets')
        ->select('asset_id', 'createby', 'createdate', 'updateasset', 'branch_id', 'asset_no', 'asset_class',
        'type_name', 'frequency', 'type_code', 'category', 'serial_no', 'dept',
        'area_code', 'location_code', 'remark', 'work_group', 'package', 'service', 
        'type_code', 'task_code', 'taskcode_3', 'item_code', 'item_name', 'desc', 'type_name', 'model', 'manufacturer', 'depart_name',
        'area_name', 'location_name', 'purc_cost', 'group', 'package_desc')
        ->where('asset_no', '=', $asset_no)
        ->first();

        return view('admin.manageAsset-report')->with('asset', $asset);
    }

    //Edit asset in manageAsset-report page
    public function EditAsset(Request $request, $asset_no)
    {
        //check if the asset_no is exist in the db
        $data = Asset::where('asset_no', $asset_no)->first();
        if (!$data) {
            return redirect()->back()->with('error', 'Asset not found');
        }

        $data->serial_no = $request->input('serial_no');
        $data->service = $request->input('service');
        $data->asset_class = $request->input('asset_class');
        $data->type_code = $request->input('type_code');
        $data->type_name = $request->input('type_name');
        $data->task_code = $request->input('task_code');
        $data->taskcode_3 = $request->input('taskcode_3');
        $data->frequency = $request->input('frequency');
        $data->desc = $request->input('desc');
        $data->item_code = $request->input('item_code');
        $data->item_name = $request->input('item_name');
        $data->category = $request->input('category');
        $data->model = $request->input('model');
        $data->manufacturer = $request->input('manufacturer');
        $data->dept = $request->input('dept');
        $data->depart_name = $request->input('depart_name');
        $data->area_code = $request->input('area_code');
        $data->area_name = $request->input('area_name');
        $data->location_code = $request->input('location_code');
        $data->location_name = $request->input('location_name');
        $data->remark = $request->input('remark');
        $data->purc_cost = $request->input('purc_cost');
        $data->work_group = $request->input('work_group');
        $data->group = $request->input('group');
        $data->package = $request->input('package');
        $data->package_desc = $request->input('package_desc');
        $data->updateasset = Carbon::now('Asia/Kuala_Lumpur')->format('Y-m-d H:i:s');

        $data->save();
        
        return redirect()->route('admin.manageAsset-report', ['asset' => $data, 'asset_no' => $data->asset_no])
        ->with('success', "Asset has been updated");
    }

     //Delete Asset
     public function DeleteAsset($asset_id)
     {
         $data = Asset::where('asset_id', $asset_id);
         $data->delete();
 
         DB::statement('SET @counter = 0;');
         DB::statement('UPDATE assets SET asset_id = @counter:=@counter+1;');
        
         return redirect('/admin/manageAsset')->with('success', 'Asset has been successfully deleted');
     }

    //show vehicle details at modal
    public function showVehicle($id)
    {
        return Vehicle::findOrFail($id);
    }

    //Add vehicle in Manage Vehicle Page
    public function AddNewVehicle(Request $request)
    {
        // put ur code here
    }

    //Edit Vehicle
    public function EditVehicle(Request $request, $id)
    {
        $data = Vehicle::find($id);
        $data->model = $request->input('model');
        $data->plate_no = $request->input('plate_no');
        $data->engine = $request->input('engine');

        $data->save();

        return redirect('/admin/manageVehicle')->with('success', 'Vehicle has been successfully updated');
        
    }

    //Delete vehicle and redirect to Manage Vehicle page
    public function DeleteVehicle($id)
    {
        //put code here
    }

}
