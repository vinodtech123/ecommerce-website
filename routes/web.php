<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

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
    return view('welcome');
});


// admin login

Route::get('admin',[LoginController::class,'getLoginForm']);
Route::post('admin/auth',[LoginController::class,'adminVerify'])->name('admin.verify');

// Route::get('admin/update-password',[LoginController::class,'updatePassword'])->name('admin.updatepassword');



Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

    // category-listing
    Route::get('admin/category',[CategoryController::class,'categoryList'])->name('admin.category');
    // manage-category
    Route::get('admin/manage-category',[CategoryController::class,'manageCategory'])->name('admin.managecategory');

    // admin logout route
    Route::get('admin/logout', function () {
        
        // way to delete the session
        session()->forget('Admin_Login');
        session()->forget('Admin_ID');
        
        return redirect('admin');


    })->name('admin.logout');

});



