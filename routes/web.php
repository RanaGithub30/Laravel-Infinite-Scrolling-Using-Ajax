<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{UserInfiniteLoadingController};

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

Route::get('user-list', [UserInfiniteLoadingController::class, 'userList'])->name('user.list');
Route::get('user-list-on-scroll', [UserInfiniteLoadingController::class, 'userListOnScroll'])->name('user.list.on.scroll');