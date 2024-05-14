<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Bookingcontroller;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Frontcontroller;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Staffcontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('front.home');
});


Route::post('/admin_login', [Admincontroller::class, 'admin_login'])->name('admin_login');





Route::get('/login', [Admincontroller::class, 'login'])->name('login');
Route::get('/logout', [Admincontroller::class, 'logout'])->name('logout');









// frontend

Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::get('/dashboard', [Admincontroller::class, 'dashboard_chart'])->name('dashboard');

    Route::get('/all_roomtype', [RoomController::class, 'all_roomtype'])->name('all_roomtype');
    Route::get('/add_roomtype', [RoomController::class, 'add_roomtype'])->name('add_roomtype');
    Route::post('/insert_roomtype', [RoomController::class, 'insert_roomtype'])->name('insert_roomtype');
    Route::get('/edit_roomtype/{id}', [RoomController::class, 'edit_roomtype'])->name('edit_roomtype');
    Route::get('/delete_roomtype/{id}', [RoomController::class, 'delete_roomtype'])->name('delete_roomtype');
    Route::post('/update_roomtype/{id}', [RoomController::class, 'update_roomtype'])->name('update_roomtype');
    
    Route::get('/all_room', [RoomController::class, 'all_room'])->name('all_room');
    Route::get('/add_room', [RoomController::class, 'add_room'])->name('add_room');
    Route::post('/insert_room', [RoomController::class, 'insert_room'])->name('insert_room');
    Route::get('/edit_room/{id}', [RoomController::class, 'edit_room'])->name('edit_room');
    Route::post('/update_room/{id}', [RoomController::class, 'update_room'])->name('update_room');
    Route::get('/delete_room/{id}', [RoomController::class, 'delete_room'])->name('delete_room');
    
    Route::get('/add_customer', [Customercontroller::class, 'add_customer'])->name('add_customer');
    Route::post('/insert_customer', [Customercontroller::class, 'insert_customer'])->name('insert_customer');
    Route::get('/all_customer', [Customercontroller::class, 'all_customer'])->name('all_customer');
    Route::get('/view_customer/{id}', [Customercontroller::class, 'view_customer'])->name('view_customer');
    Route::get('/edit_customer/{id}', [Customercontroller::class, 'edit_customer'])->name('edit_customer');
    Route::get('/delete_customer/{id}', [Customercontroller::class, 'delete_customer'])->name('delete_customer');
    Route::post('/update_customer/{id}', [Customercontroller::class, 'update_customer'])->name('update_customer');
    Route::get('/add_department', [Staffcontroller::class, 'add_department'])->name('add_department');
    Route::get('/all_department', [Staffcontroller::class, 'all_department'])->name('all_department');
    Route::get('/edit_department/{id}', [Staffcontroller::class, 'edit_department'])->name('edit_department');
    Route::post('/update_department/{id}', [Staffcontroller::class, 'update_department'])->name('update_department');
    Route::post('/insert_department', [Staffcontroller::class, 'insert_department'])->name('insert_department');
    Route::get('/delete_department/{id}', [Staffcontroller::class, 'delete_department'])->name('delete_department');
    
    Route::get('/add_staff', [Staffcontroller::class, 'add_staff'])->name('add_staff');
    Route::get('/all_staff', [Staffcontroller::class, 'all_staff'])->name('all_staff');
    Route::post('/insert_staff', [Staffcontroller::class, 'insert_staff'])->name('insert_staff');
    Route::get('/view_staff/{id}', [Staffcontroller::class, 'view_staff'])->name('view_staff');
    Route::get('/edit_staff/{id}', [Staffcontroller::class, 'edit_staff'])->name('edit_staff');
    Route::get('/delete_staff/{id}', [Staffcontroller::class, 'delete_staff'])->name('delete_staff');
    Route::post('/update_staff/{id}', [Staffcontroller::class, 'update_staff'])->name('update_staff');
    Route::get('/payment_staff/{id}', [Staffcontroller::class, 'payment_staff'])->name('payment_staff');
    Route::post('/insert_staff_payment/{id}', [Staffcontroller::class, 'insert_staff_payment'])->name('insert_staff_payment');
    Route::get('/all_staff_payment', [Staffcontroller::class, 'all_staff_payment'])->name('all_staff_payment');
    
    Route::get('/all_booking', [Bookingcontroller::class, 'all_booking'])->name('all_booking');
    Route::get('/search_room', [Bookingcontroller::class, 'search_room'])->name('search_room');
    Route::get('/room_availability', [Bookingcontroller::class, 'room_availability'])->name('room_availability');
    Route::get('/final_booking/{id}/{in}/{out}', [Bookingcontroller::class, 'final_booking'])->name('final_booking');
    Route::post('/room_booking', [Bookingcontroller::class, 'room_booking'])->name('room_booking');
    Route::get('/room_type_image_delete/{img_id}', [RoomController::class, 'delete_roomtype_img'])->name('delete_roomtype_img');
    Route::get('/view_roomtype/{id}', [RoomController::class, 'view_roomtype'])->name('view_roomtype');
    Route::get('/dashboard_chart', [Bookingcontroller::class, 'dashboard_chart'])->name('dashboard_chart');

    Route::post('/logout', [Frontcontroller::class, 'logout'])->name('logout');
    Route::get('/book_now', [Frontcontroller::class, 'book_now'])->name('book_now');
    Route::post('/search_room', [Frontcontroller::class, 'search_room'])->name('search_room');
    Route::get('/room_details/{id}', [Frontcontroller::class, 'room_details'])->name('room_details');
    Route::post('/confirm_booking', [Frontcontroller::class, 'confirm_booking'])->name('confirm_booking');
});
Route::get('/user_login', [Frontcontroller::class, 'user_login'])->name('user_login');
Route::get('/user_register', [Frontcontroller::class, 'user_register'])->name('user_register');
Route::post('/post_login', [Frontcontroller::class, 'post_login'])->name('post_login');
Route::post('/post_register', [Frontcontroller::class, 'post_register'])->name('post_register');
