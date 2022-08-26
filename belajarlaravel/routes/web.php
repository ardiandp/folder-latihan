<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxBOOKCRUDController;
use App\Http\Controllers\PostController;

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

Route::resource('mahasiswa',MahasiswaController::class);
Route::get('ajax-book-crud', [AjaxBOOKCRUDController::class, 'index']);
Route::post('add-update-book', [AjaxBOOKCRUDController::class, 'store']);
Route::post('edit-book', [AjaxBOOKCRUDController::class, 'edit']);
Route::post('delete-book', [AjaxBOOKCRUDController::class, 'destroy']);

Route::resource('ajaxposts','PostAjaxController');

