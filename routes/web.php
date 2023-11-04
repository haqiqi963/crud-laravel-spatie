<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'role:admin|user'])->group(function (){
    Route::get('post', [PostController::class, 'index']);
    Route::get('post-add', [PostController::class, 'add']);
    Route::post('post-add', [PostController::class, 'store']);
    Route::get('post-edit/{id}', [PostController::class, 'edit']);
    Route::post('post-edit/{id}', [PostController::class, 'update']);
    Route::get('post-destroy/{id}', [PostController::class, 'destroy']);
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
