<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('clinics', ClinicController::class);
Route::resource('workers', WorkerController::class);

Route::get('/data', [ClinicController::class, 'data'])->name('clinics.data');

Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'es'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('lang');
