<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/' , [HomeController::class , 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home' , [AdminController::class , 'index']);
route::get('/category_page' , [AdminController::class , 'category_page']);

route::post('/add_category' , [AdminController::class , 'add_category']);
route::get('/cat_delete/{id}' , [AdminController::class , 'cat_delete']);

route::get('/edit_category/{id}' , [AdminController::class , 'edit_category']);
route::post('update_categpry/{id}' ,[AdminController::class , 'update_categpry']);


route::get('/add_book' , [AdminController::class , 'add_book']);

route::post('/store_book' , [AdminController::class , 'store_book']);

route::get('/show_book' , [AdminController::class , 'show_book']);
route::get('/book_delete/{id}' , [AdminController::class , 'book_delete']);

route::get('/edit_book/{id}' , [AdminController::class , 'edit_book']);

route::post('/update_book/{id}' , [AdminController::class , 'update_book']);










