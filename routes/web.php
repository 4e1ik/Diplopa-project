<?php

use App\Http\Controllers\Account\PersonalController;
use App\Http\Controllers\Account\PostController;
use App\Http\Helpers\CordinatsHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [MainController::class, 'index'])->name('home_page');
//Route::get('/personal_cabinet', [PersonalController::class, 'index'])->name('personal_cabinet_page')->middleware('auth');

//Route::resource('diploma', MainDiplomaController::class)->middleware('auth');

Route::middleware('auth')->group(callback: function () {

    Route::get('/', [MainDiplomaController::class, 'index'])->name('home')->withoutMiddleware('auth');
//    Route::get('map', [MainDiplomaController::class, 'show'])->name('show_cordinats')->withoutMiddleware('auth');


    Route::get('test', function () {
        $places = new CordinatsHelper();
        return $places->getCordinats();
    })->withoutMiddleware('auth');

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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
