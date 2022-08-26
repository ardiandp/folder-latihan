<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\PostController;
use App\Controllers\PostAjaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataTableAjaxCRUDController;
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

Route::resource('posts', 'App\Http\Controllers\PostController');

Route::resource('ajaxposts','App\Http\Controllers\PostAjaxController');

Route::get('users', [UserController::class, 'index'])->name('users.index');


Route::get('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('store-company', [DataTableAjaxCRUDController::class, 'store']);
Route::post('edit-company', [DataTableAjaxCRUDController::class, 'edit']);
Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy']);