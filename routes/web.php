<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Http\Middleware\Authenticate;


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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', function(){
    return redirect()->route('contact.index');
})->name('home');

;

Route::group(['prefix'=>'contact'], function(){
    Route::get('/index',[ContactController::class, 'index'])->name('contact.index');
    Route::get('/create',[ContactController::class, 'create'])->name('contact.create');
    Route::post('/store',[ContactController::class, 'store'])->name('contact.store');
    Route::get('/edit/{id}',[ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/{id}/update',[ContactController::class, 'update'])->name('contact.update');
})->middleware(Authenticate::class);


