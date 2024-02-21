<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\EmailVerificationRequest;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [ShopController::class, 'create']);
Route::post('/search', [ShopController::class, 'search']);
Route::get('/detail/{shop_id}', [ShopController::class,'detail']);
Route::get('/menu', [AuthenticatedSessionController::class, 'menu']);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', function (EmailVerificationRequest $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/thanks');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/thanks', [RegisteredUserController::class, 'thanks']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::group(['middleware'=>['auth', 'can:user-higher']], function (){
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
});

Route::group(['middleware'=>['auth', 'can:user-only']], function(){
    Route::get('/mypage', [UserInformationController::class, 'create'])->middleware('verified');
    Route::post('/favorite', [UserInformationController::class, 'store']);
    Route::delete('/favorite', [UserInformationController::class, 'destroy']);
    Route::post('/reservation', [ReservationController::class, 'store']);
    Route::get('/reservation/{reservation_id}', [ReservationController::class, 'create']);
    Route::patch('/reservation', [ReservationController::class, 'update']);
    Route::delete('/reservation', [ReservationController::class, 'destroy']);
    Route::get('/done', [ReservationController::class, 'done']);
    Route::get('/review/{reservation_id}', [ReviewController::class, 'create']);
    Route::post('/review', [ReviewController::class, 'store']);
});

Route::group(['middleware'=>['auth', 'can:manager-only']], function(){
    Route::get('/management', [ManagementController::class, 'create']);
    Route::post('/management/image', [ManagementController::class, 'imageStore']);
    Route::post('/management/area', [ManagementController::class, 'areaStore']);
    Route::post('/management/genre', [ManagementController::class, 'genreStore']);
    Route::post('/management/shop', [ManagementController::class, 'shopStore']);
    Route::patch('/management', [ShopController::class, 'update']);
});

Route::group(['middleware'=>['auth', 'can:admin-only']], function(){
    Route::get('/admin', [AdminController::class, 'create']);
    Route::post('/admin', [AdminController::class, 'store']);
});