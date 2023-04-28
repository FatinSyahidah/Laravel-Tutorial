<?php

namespace App\Http\Controllers;

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
}
