<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Yandex\Geocode\YandexGeocodeServiceProvider;

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

Route::get('/', [MainController::class, 'index'])->name('home_page');
Route::get('/personal_cabinet', [MainController::class, 'index'])->name('personal_cabinet_page');

//Route::get('/test', function (\Illuminate\Http\Request $request) {
//    $data = Yandex\Geocode\Facades\YandexGeocodeFacade::setQuery('Минск, Жудро')->load();
//    $data = $data->getResponse()->getType();
//    dd($data);
//});
