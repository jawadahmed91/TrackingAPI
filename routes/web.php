<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackingController;

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

Route::get('/', [AuthenticationController::class, 'login'])->name('auth.login');
Route::post('/logged', [AuthenticationController::class, 'logged'])->name('auth.logged');
Route::get('/register', [AuthenticationController::class, 'register'])->name('auth.register');
Route::post('/registered', [AuthenticationController::class, 'registered'])->name('auth.registered');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
Route::get('/account', [DashboardController::class, 'accounts'])->name('setting');
/**************************************************************************************************************************************************************************
 *
 *
 * Tracking Area
 *
 *
***************************************************************************************************************************************************************************/
Route::get('/trackings', [TrackingController::class, 'trackings'])->name('tracking.trackings');
Route::get('/tracking/create', [TrackingController::class, 'tracking_create'])->name('tracking.tracking-create');
Route::post('/tracking/store', [TrackingController::class, 'tracking_store'])->name('tracking.tracking-store');
Route::get('/tracking/edit/{id}', [TrackingController::class, 'tracking_edit'])->name('tracking.tracking-edit');
Route::put('/update-tracking/{id}', [TrackingController::class, 'update_tracking'])->name('tracking.update-tracking');
Route::delete('/delete-tracking/{id}', [TrackingController::class, 'delete_tracking'])->name('tracking.delete-tracking');
