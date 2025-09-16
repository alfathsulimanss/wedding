<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageWeddingController;
use App\Http\Controllers\InvitationListController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SendWaNotifController;

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
    if (\Auth::check()){
        if (\Auth::user()->roles != 'user'){
            return redirect(url('manage-wedding'));
        } else {
            return redirect(url('invitation-list'));
        }
    } else {
        return redirect(url('login'));
    }
});

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return response()->redirectTo('/');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'manage-wedding'], function () {
        Route::get('/', [ManageWeddingController::class, 'index']);
        Route::get('/data', [ManageWeddingController::class, 'weddingProjectTable']);
        Route::post('/input', [ManageWeddingController::class, 'input']);
        Route::post('/edit/{id}', [ManageWeddingController::class, 'edit']);
        Route::post('/delete/{id}', [ManageWeddingController::class, 'delete']);
    });

    Route::group(['prefix' => 'invitation-list'], function () {
        Route::get('/', [InvitationListController::class, 'index']);
        Route::get('/data', [InvitationListController::class, 'invitationListTable']);
        Route::post('/input', [InvitationListController::class, 'input']);
        Route::post('/edit/{id}', [InvitationListController::class, 'edit']);
        Route::post('/delete/{id}', [InvitationListController::class, 'delete']);
    });
});

Route::get('/landing/{slug}/{wedding_id}/{invited_id}/{invited_name}', [LandingController::class, 'index']);
Route::get('/wa', [SendWaNotifController::class, 'sendWa']);
