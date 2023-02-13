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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [MainController::class, 'index'])->name('home_page');
//Route::get('/personal_cabinet', [PersonalController::class, 'index'])->name('personal_cabinet_page')->middleware('auth');

//Route::resource('diploma', MainDiplomaController::class)->middleware('auth');

Route::middleware('auth')->group(callback: function () {

    Route::get('/', [MainDiplomaController::class, 'index'])->name('home')->withoutMiddleware('auth');
//    Route::get('/personal_cabinet', [PersonalController1::class, 'index'])->name('personal_cabinet');
//    Route::get('/personal_cabinet/edit', [PersonalController1::class, 'edit'])->name('edit_data');

//    Route::get('/logout', [LogoutController::class, 'perform']);
//Route::get('test', function (){
//    return [
//        [53.90988484530737, 27.48204069752266],
//        [53.90026025373433, 27.566150249553452],
//        [53.90926025373433, 27.567150249553462],
//        [53.909917, 27.496272]
//    ];
//});
    Route::prefix('account')->group(function(){
        Route::get('/', [PersonalController::class, 'index'])->name('account') ;
        Route::get('/edit', [PersonalController::class, 'edit'])->name('account_edit');
        Route::put('/update', [PersonalController::class, 'update'])->name('account_update');
        Route::delete('/posts/{post}/edit/{image}/destroy', [PostController::class, 'imageDestroy'])->name('image_destroy');
        Route::resources([
            'posts' => PostController::class,
//        'diploma' => MainDiplomaController::class,
        ]);
    });

});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
