<?php

use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionController;
use App\Http\Livewire\Register;
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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/list', [ServiceController::class, 'list']);
Route::get('services/{service:slug}', [ServiceController::class, 'details'])->name('services.show');

Route::get('/contact', [ContactController::class, 'get']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::get('/login', [SessionController::class, 'create'])->middleware('guest');

Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');

//Route::post('services/{service:slug}/comments', [CommentsController::class, 'store'])->middleware('auth');

Route::get('user/profile/{user}', [ProfileController::class, 'get'])->middleware('auth');;


Route::middleware('can:admin')->group(function () {
    Route::post('admin/services', [AdminServiceController::class, 'store']);
    Route::get('admin/services/create', [AdminServiceController::class, 'create']);
    Route::get('admin/services/', [AdminServiceController::class, 'index']);
    Route::get('admin/services/{service}/edit', [AdminServiceController::class, 'edit']);
    Route::patch('admin/services/{service}', [AdminServiceController::class, 'update']);
    Route::delete('admin/services/{service}', [AdminServiceController::class, 'destroy']);
});

