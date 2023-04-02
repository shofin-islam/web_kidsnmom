<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ManufacturerController;
use Spatie\Activitylog\Models\Activity;


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

/*
|--------------------------------------------------------------------------
| return view('welcome'); to get the admin login section
*/

Route::get('/', function () {

    /*
    |--------------------------------------------------------------------------
    | return view('welcome'); to get the multi auth admin and user login section
    */

    // return view('welcome');

    return view('auth.login');
});

/*
|--------------------------------------------------------------------------
| return view('usersdashboard'); to handle logged in users back 
*/

// Route::get('/', function () {
//     return view('usersdashboard');
// })->middleware(['auth', 'verified'])->name('/');


/*
|--------------------------------------------------------------------------
| this is the working code for auth dashboard 
*/
// Route::get('/dashboard', function () {
//     return view('usersdashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [DashboardController::class,'getLastMonthData']);
    Route::get('/customers/due', [DashboardController::class,'getDueCustomerList']);
    Route::get('/customers/due/exports', [ProductOrderController::class, 'exportDueCustomers']);
    Route::get('/sales/exports', [DashboardController::class,'getOrderlist'])->name('sales.exportview');
    Route::post('/sales/exports', [ProductOrderController::class, 'exportSalesData'])->name('sales.export');
    Route::get('/customers/due/upcomming', [DashboardController::class,'getNextRecoveryCustomerslist']);

    Route::get('/files', [FileController::class,'index'])->name('files.index');
    Route::get('/files/add', [FileController::class,'create'])->name('files.create');
    Route::post('/files/add', [FileController::class,'store'])->name('files.store');
    Route::get('/files/show/{id}', [FileController::class,'show'])->name('files.show');

    })->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('expenseType', ExpenseTypeController::class);
    Route::resource('expense', ExpenseController::class);
    Route::post('/sales/productById', [ProductOrderController::class, 'productById']);
    Route::post('/sales/customerById', [ProductOrderController::class, 'customerById']);
    Route::post('/sales/orderDetails', [ProductOrderController::class, 'orderDetails']);
    Route::resource('sales', ProductOrderController::class);
    Route::resource('payment', PaymentController::class);

    Route::get('/manufacturer', [ManufacturerController::class, 'index'])->name('manufacturer');
    Route::get('/manufacturer/create', [ManufacturerController::class, 'create'])->name('manufacturer.create');
    Route::post('/manufacturer/store', [ManufacturerController::class, 'store'])->name('manufacturer.store');
    Route::get('/manufacturer/edit/{id}', [ManufacturerController::class, 'edit'])->name('manufacturer.edit');
    Route::post('/manufacturer/update/{id}', [ManufacturerController::class, 'update'])->name('manufacturer.update');
    Route::get('/manufacturer/destroy/{id}', [ManufacturerController::class, 'destroy'])->name('manufacturer.destroy');
});

Route::get('/logs', function () {
    return Activity::where([
        ['subject_type', '=', 'App\Models\ProductOrder'],
        ['subject_id', '=', '6']])->get();
})->middleware(['auth', 'verified'])->name('logs');
