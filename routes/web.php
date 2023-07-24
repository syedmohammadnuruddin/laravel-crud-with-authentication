<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register',[\App\Http\Controllers\userController::class,'showRegister'])->name('showRegister');
Route::post('register',[\App\Http\Controllers\userController::class,'register'])->name('register.save');

Route::get('verify-email/{email}/{code}',[\App\Http\Controllers\userController::class,'verifyUser'])->name('verifyEmail');

Route::get('login',[\App\Http\Controllers\UserAuthController::class,'showLogin'])->name('showLogin');
Route::post('login',[\App\Http\Controllers\UserAuthController::class,'login'])->name('login');

Route::get('logout',[\App\Http\Controllers\UserAuthController::class,'logout'])->name('logout');

Route::group(['middleware'=>'authCheck','prefix'=>'list'],function (){
    Route::get('/',[\App\Http\Controllers\PhoneBookController::class,'index'])->name('contactList');
    Route::post('/create',[\App\Http\Controllers\PhoneBookController::class,'create'])->name('createContact');
    Route::get('/{id}/edit',[\App\Http\Controllers\PhoneBookController::class,'showEdit'])->name('showEdit');
    Route::post('/{id}/edit',[\App\Http\Controllers\PhoneBookController::class,'editContact'])->name('editContact');
    Route::get('/{id}/delete',[\App\Http\Controllers\PhoneBookController::class,'deleteContact'])->name('deleteContact');
});


