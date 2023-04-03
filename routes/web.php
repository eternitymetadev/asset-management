<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/', function () {
    if(Auth::check())
    {
       $userrole = Auth::user()->role_id;
        if($userrole == 1){
            return redirect('/admin/dashboard');
        }
        else if($userrole == 2) {
            return redirect('/branch-manager/dashboard');
        }
        else if($userrole == 3) {
            return redirect('/branch-user/dashboard');
        }
        else if($userrole == 4) {
            return redirect('/account-manager/dashboard');
        }
        else if($userrole == 5) {
            return redirect('/client-user/consignments');
        }
    }
   else
    {
      return view('auth.login');
    }
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [LoginController::class, 'logout']);


// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::group(['prefix'=>'admin', 'middleware'=>['auth','PermissionCheck']], function()
{
    Route::resource('dashboard', DashboardController::class);
    Route::resource('inventories', InventoryController::class);
    Route::resource('users', UserController::class);
});

Route::get('/forgot-session', [DashboardController::class, 'ForgotSession']);
Route::get('/forbidden-error', [DashboardController::class, 'ForbiddenPage']);