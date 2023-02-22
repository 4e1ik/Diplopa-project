<?php

use App\Http\Controllers\Account\PersonalController;
use App\Http\Controllers\Account\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainDiplomaController;

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

Route::middleware('auth')->middleware('verified')->group(callback: function () {

    Route::get('/', [MainDiplomaController::class, 'index'])->name('home')->withoutMiddleware('auth')->withoutMiddleware('verified');
    Route::get('map', [MainDiplomaController ::class, 'show'])->name('show_cordinats')->withoutMiddleware('auth')->withoutMiddleware('verified');
    Route::get('user_map', [PersonalController::class, 'show'])->name('show_user_cordinats');

    Route::prefix('account')->group(function () {
        Route::get('/', [PersonalController::class, 'index'])->name('account');
        Route::get('/edit', [PersonalController::class, 'edit'])->name('account_edit');
        Route::put('/update', [PersonalController::class, 'update'])->name('account_update');
        Route::delete('/posts/{post}/edit/{image}/destroy', [PostController::class, 'imageDestroy'])->name('image_destroy');
        Route::resources([
            'posts' => PostController::class,
        ]);
    });

});

Auth::routes(['verify' => 'true']);
