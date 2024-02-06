<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;

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
Route::get('/search', [ShopController::class, 'search']);
Route::get('/detail/{shop_id}', [ShopController::class,'detail']);
Route::get('/menu', [AuthenticatedSessionController::class, 'menu']);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/thanks', [RegisteredUserController::class, 'thanks']);
Route::get('/login', [AuthenticatedSessionController::class, 'create']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::get('/mypage', [UserInformationController::class, 'create']);
Route::post('/favorite', [UserInformationController::class, 'store']);
Route::delete('/favorite', [UserInformationController::class, 'destroy']);
Route::post('/reservation', [ReservationController::class, 'store']);
Route::get('/reservation/{reservation_id}', [ReservationController::class, 'create']);
Route::patch('/reservation', [ReservationController::class, 'update']);
Route::delete('/reservation', [ReservationController::class, 'destroy']);
Route::get('/done', [ReservationController::class, 'done']);
Route::get('/review', [ReviewController::class, 'create']);
Route::post('/review', [ReviewController::class, 'store']);