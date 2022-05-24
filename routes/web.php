<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\planController;
use App\Http\Controllers\deliveryController;
use App\Http\Controllers\productionController;
use App\Http\Controllers\settingsController;

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
//     return view('login');
// });
Route::view('/','index');  //add redirector later
Route::view('dashboard','index');


Route::view('create-plan','createPlan');

Route::view('production-report','productionReport');
Route::view('create-delivery','createDelivery');


//dynamic
Route::get('create-order',[orderController::class, 'retrieveData']); //retrieve dropdown data to show in create page
Route::post('add-order',[orderController::class, 'addData']); //add order to database
Route::get('order',[orderController::class, 'showData']); //show all order

//delivery
Route::get('all-delivery',[deliveryController::class, 'showData']);
Route::get('edit-delivery{id}', [deliveryController::class,'editData']);
Route::put('start-receive', [deliveryController::class,'updateReceiveData']);
Route::put('add-receive', [deliveryController::class,'addReceiveData']);
Route::put('add-delivery', [deliveryController::class,'addDeliveryData']);

//receive & delivery
Route::get('all-receive',[deliveryController::class, 'showReceiveData']);
Route::get('daily-delivery',[deliveryController::class, 'showDeliveryData']);

//plan
Route::get('plan',[planController::class, 'showData']);
Route::get('edit-plan{id}', [planController::class,'editData']);
Route::put('update-plan', [planController::class,'updateData']);

//production
Route::get('all-production',[productionController::class, 'showData']);
Route::get('edit-production{id}', [productionController::class,'editData']);
Route::put('update-production', [productionController::class,'updateData']);
Route::put('add-production', [productionController::class,'addDailyData']); // add daily production
Route::get('daily-production',[productionController::class, 'showDailyData']); //day wise production

//settings

//merchandiser
Route::get('all-merchandiser',[settingsController::class, 'showMerchandiserData']); //show all merchandiser
Route::put('add-merchandiser', [settingsController::class,'addMerchandiser']); // add new merchandiser
Route::get('get-merchandiser{id}', [settingsController::class,'getMerchandiserData']); //get merchandiser name
Route::put('edit-merchandiser', [settingsController::class,'editMerchandiserData']);
Route::put('delete-merchandiser', [settingsController::class,'deleteMerchandiserData']);

//supplier
Route::get('all-supplier',[settingsController::class, 'showSupplierData']); //show all merchandiser
Route::put('add-supplier', [settingsController::class,'addSupplier']); // add new merchandiser
Route::get('get-supplier{id}', [settingsController::class,'getSupplierData']); //get merchandiser name
Route::put('edit-supplier', [settingsController::class,'editSupplierData']);
Route::put('delete-supplier', [settingsController::class,'deleteSupplierData']);