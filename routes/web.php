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
    return view('homepage');
});

// Route::get('/announcement', function () {
//     return view('announcement');
// });

Route::get('/announcement', [AdminController::class, 'showAnnouncement']);

Route::get('/contact_us', function () {
    return view('contact_us');
});

Route::get('/fullypaid', function () {
    return view('fullypaid');
});
Route::get('/terminated', function () {
    return view('terminated');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/create', function () { return view('adminCreate'); });
    // Route::get('/announcement', function () { return view('adminAnnouncement'); });
    Route::get('/table', [AdminController::class, 'getAllData']);
    Route::post('/create', [AdminController::class, 'createAdminData'])->name('createAdminData');
    Route::post('/update', [AdminController::class, 'updateAdminData'])->name('updateAdminData');
    Route::delete('/delete/{dbTable}/{trancheNo}', [AdminController::class, 'deleteAdminData']);

    Route::get('/announcement', [AdminController::class, 'getAllAnnouncement']);
    Route::post('/announcement', [AdminController::class, 'uploadAnnouncement'])->name('uploadAnnouncement');
    Route::delete('/announcement/delete/{filename}', [AdminController::class, 'deleteAnnouncement']);
    
});

// Route::get('/ajaxSearchFullypaid', [FullypaidController::class, 'ajaxSearch'])->name('ajaxSearchFullypaid');

Route::group(['prefix' => 'search'], function(){
    Route::get('/fullypaid', [FullypaidController::class, 'searchFullypaid'])->name('searchFullypaid');
    Route::get('/terminated', [TerminatedController::class, 'searchTerminated'])->name('searchTerminated');
});
