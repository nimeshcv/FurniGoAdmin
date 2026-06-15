<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersonController;

use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\StoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AdminController::class,'open_login']);
Route::get('/cpwd',[AdminController::class,'open_cpwd']);
 
Route::get('/home',[AdminController::class,'home']);
Route::get('/logout',[AdminController::class,'logout']);
Route::get('/aboutus',[AdminController::class,'aboutus']);

Route::get('/forgot_pass',[AdminController::class,'open_forgot_pwd']);


Route::get('/registero',[AdminController::class,'open_register']);

Route::post('/login',[AdminController::class,'login']);
Route::post('/register',[AdminController::class,'register']);

Route::get('/user',function(){
    return view('userhome');
});



Route::get('/product',function(){
    return view('product');
});





Route::resource('banner', BannerController::class);
Route::resource('category', CategoryController::class);
Route::resource('store', StoreController::class);

Route::post('/categorysave',[CategoryController::class,'saveCategory']);
Route::get('/list',[CategoryController::class,'index']);

Route::get('/admin',[LoginController::class,'getrevenue']);


Route::get('/add',[CategoryController::class,'add']);

Route::get('/category/{id}/update',[CategoryController::class,'edit']);

Route::put('/category/{id}/edit',[CategoryController::class,'update']);

Route::get('/category/{id}/delete',[CategoryController::class,'destroy']);
Route::get('/cart/{id}/delete',[CartController::class,'destroy']);


Route::resource('furnitures',FurnitureController::class);


Route::get("/addtobest/{id}",[CategoryController::class,'addtobestseller']);
Route::get("/removebest/{id}",[CategoryController::class,'removebest']);

Route::get('/addedtocart/{id}',[CartController::class,'insertcart']);
Route::get('/productdetail/{id}',[FurnitureController::class,'productdetailindex']);

Route::get('/viewcart',[CartController::class,'index']);
Route::get('/viewfurniture/{id}/asc',[LoginController::class,'asc']);
Route::get('/viewfurniture/{id}/desc',[LoginController::class,'desc']);
Route::post('/cart/done',[CartController::class,'cartdone']);
Route::get('/show/payment/form',[CartController::class,'showPaymentForm']);

Route::get('/update/{id}/plus',[CartController::class,'plus']);
Route::get('/update/{id}/minus',[CartController::class,'minus']);

Route::get('/task',[CategoryController::class,'task']);
Route::get('/user',[LoginController::class,'userdisplay']);

Route::resource('coupon',CouponController::class);

 
Route::get('/status/{id}',[CategoryController::class,'status']);

Route::get('/contact',function() {
    return view('contact');
});

Route::get('/about',function() {
    return view('about');
});


Route::get('/categoryAll',[CategoryController::class,'AllCategory']);

Route::get('/myorder',[LoginController::class,'getOrderHistory']);


//api routes
Route::get('/api_data',[ApiController::class,'getData']);
Route::post('/api_register',[ApiController::class,'register']);
Route::post('/api_login',[ApiController::class,'login']);
Route::post('/api_applycoupon',[ApiController::class,'getCuponFromCode']);
Route::post('/api_addaddress',[ApiController::class,'addAddress']);
Route::post('/api_getaddress',[ApiController::class,'getAddress']);
Route::post('/api_addorder',[ApiController::class,'addorder']);
Route::post('/api_getorder', [ApiController::class,'getOrder']);
Route::post('/api_updateqty', [ApiController::class,'updateQty']);
Route::post('/api_removeorder',[ApiController::class,'removeOrder']);
Route::post('/api_confirmorder',[ApiController::class,'confirmOrder']);
Route::post('/api_getOrderhistory',[ApiController::class,'getOrderhistory']);
