<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function() {
    Route::get('/home', App\Http\Livewire\Home::class)->name('home');
    Route::get('/beams', App\Http\Livewire\Beams\Index::class)->name('beams');
    Route::get('/columns', App\Http\Livewire\Columns\Index::class)->name('columns');
    Route::get('/eangles', App\Http\Livewire\Eangles\Index::class)->name('eangles');
    Route::get('/baseplates', App\Http\Livewire\BasePlates\Index::class)->name('baseplates');
    Route::get('/connections', App\Http\Livewire\Connections\Index::class)->name('connections');
    Route::get('/settings', App\Http\Livewire\Settings\Index::class)->name('settings');
});
