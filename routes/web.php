<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingListController;
use App\Http\Controllers\BookingRoomController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\UserRoomController;
use App\Http\Controllers\ChangePassUserController;

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

Auth::routes();

//akses admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('admin');

    Route::get('/room', [RoomController::class, 'index'])->name('room')->middleware('admin');
    Route::get('/room/detail/{id_room}', [RoomController::class, 'detail'])->middleware('admin');
    Route::get('/room/add', [RoomController::class, 'add'])->middleware('admin');
    Route::post('/room/insert', [RoomController::class, 'insert'])->middleware('admin');
    Route::get('/room/edit/{id_room}', [RoomController::class, 'edit'])->middleware('admin');
    Route::post('/room/update/{id_room}', [RoomController::class, 'update'])->middleware('admin');
    Route::get('/room/delete/{id_room}', [RoomController::class, 'delete'])->middleware('admin');

    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('admin');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('admin');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->middleware('admin');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware('admin');

    Route::get('/bookinglist', [BookingListController::class, 'index'])->name('bookinglist')->middleware('admin');
    Route::get('/bookinglist/approved/{id_booking}', [BookingListController::class, 'approved'])->middleware('admin');
    Route::get('/bookinglist/rejected/{id_booking}', [BookingListController::class, 'rejected'])->middleware('admin');
    Route::get('/bookinglist/exportpdf', [BookingListController::class, 'exportpdf'])->name('exportpdf')->middleware('admin');

    Route::get('/report', [ReportController::class, 'index'])->name('report')->middleware('admin');
    //Route::get('/report/export/', [ReportController::class, 'export'])->middleware('admin');
    

    Route::get('/changepassword', [ChangePassController::class, 'index'])->name('changepassword')->middleware('admin');
    Route::post('/changepassword/update', [ChangePassController::class, 'update'])->middleware('admin');

});

//hak akses user
Route::group(['middleware' => 'user'], function () {
    Route::get('/dashboarduser', [App\Http\Controllers\HomeUserController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeUserController::class, 'index']);

    Route::get('/userroom', [UserRoomController::class, 'index'])->name('userroom');

    Route::get('/bookingroom', [BookingRoomController::class, 'index'])->name('bookingroom');
    Route::get('/bookingroom/add', [BookingRoomController::class, 'add'])->name('bookingroomadd');
    Route::post('/bookingroom/insert', [BookingRoomController::class, 'insert']);

    Route::get('/changepassworduser', [ChangePassUserController::class, 'index']);
    Route::post('/changepassworduser/update', [ChangePassUserController::class, 'update']);
});