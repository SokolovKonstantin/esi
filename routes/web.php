<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StartPage;
use App\Http\Controllers\WorkingWithDevices;
use App\Http\Controllers\AddDevice;
use App\Http\Controllers\EditDevice;
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


//Переход на стартовую страницу
Route::get('/', [StartPage::class, 'mainMethod']);

//Переход на страницу работа с приборами
Route::get('/working_with_devices', [WorkingWithDevices::class, 'mainMethod']);

//Поиск прибора по IP
Route::post('/search_by_ip', [WorkingWithDevices::class, 'searchByIP']);

//Поиск прибора по локализации
Route::post('/search_by_location', [WorkingWithDevices::class, 'searchByLocation']);

//Занесение прибора в базу
Route::post('/add_device_to_base', [AddDevice::class, 'addDeviceToBase']);

//Открытие формы редактирования прибора
Route::post('/edit_device', [EditDevice::class, 'mainMethod']);
