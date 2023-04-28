<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/dashboard');

});

//view route
Route::get('/admin/manageAsset', [AdminController::class, 'viewManageAssetPage']);
//Route::get('/admin/manageAsset-report', [AdminController::class, 'viewManageAssetReportPage']);
Route::get('/admin/manageVehicle', [AdminController::class, 'viewManageVehiclePage']);
Route::get('/admin/manageAsset-report/{asset_no}', [AdminController::class, 'AssetReportPage'])->name('admin.manageAsset-report');

//Add Asset
Route::post('/addAsset', [AdminController::class, 'AdminAddAsset']);

//Edit Asset
Route::post('/editAsset/{asset_no}', [AdminController::class, 'EditAsset']);

//Delete Asset
Route::post('/deleteAsset/{asset_id}', [AdminController::class, 'DeleteAsset']);

//Manage Vehicle
Route::get('/showVehicle/{id}', 'App\Http\Controllers\AdminController@showVehicle');
Route::post('/addVehicle', [AdminController::class, 'AddNewVehicle']);
Route::post('/updateVehicle/{id}', [AdminController::class, 'EditVehicle']);
Route::delete('/deleteVehicle/{id}', [AdminController::class, 'DeleteVehicle']);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
