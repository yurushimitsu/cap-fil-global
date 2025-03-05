<?php

use App\Http\Controllers\FullypaidController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TerminatedController;
use App\Models\Fullypaid;
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

Route::get('/home', function () {
    return view('content');
});

Route::get('/fullypaid', function () {
    return view('fullypaid');
});
Route::get('/terminated', function () {
    return view('terminated');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/create', function () { return view('adminCreate'); });
    Route::post('/create', [AdminController::class, 'createAdminData'])->name('createAdminData');

    Route::get('/table', [AdminController::class, 'getAllData']);
});

Route::get('/ajaxSearchFullypaid', [FullypaidController::class, 'ajaxSearch'])->name('ajaxSearchFullypaid');

Route::group(['prefix' => 'search'], function(){
    Route::get('/fullypaid', [FullypaidController::class, 'searchFullypaid'])->name('searchFullypaid');
    Route::get('/terminated', [TerminatedController::class, 'searchTerminated'])->name('searchTerminated');
});
