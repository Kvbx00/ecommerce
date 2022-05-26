<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;

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
    return view('base');
});

Route::get('/', [BaseController::class, 'mainProduct']);

Route::get('/shampoo', [BaseController::class, 'shampoo']);

Route::get('/quick', [BaseController::class, 'quick']);

Route::get('/brush', [BaseController::class, 'brush']);

Route::get('/foam', [BaseController::class, 'foam']);

Route::get('/sponge', [BaseController::class, 'sponge']);

Route::get('/microfibre', [BaseController::class, 'microfibre']);

Route::get('/wax', [BaseController::class, 'wax']);

Route::get('/single', [BaseController::class, 'single']);

Route::get('/login', [LoginController::class, 'loginView']);

Route::get('/registration', [RegistrationController::class, 'registrationView']);
Route::post('registration', [RegistrationController::class, 'create']);

Route::get('/login', [SessionsController::class, 'loginView']);
Route::post('/login', [SessionsController::class, 'sessionStart']);
Route::get('/logout', [SessionsController::class, 'sessionDestroy']);

Route::get('/admin', [AdminController::class, 'admin']);

Route::get('/admin_product_add', [AdminController::class, 'ProdInsert']);
Route::post('admin_product_add', [AdminController::class, 'product_create']);

Route::get('admin_product_delete', [AdminController::class, 'select_product']);
Route::get('delete/{id}', [AdminController::class, 'destroy_product']);

Route::get('admin_product_edit', [AdminController::class, 'ProdEdit']);
Route::get('product_edit/{id}', [AdminController::class, 'product_edit']);
Route::post('admin_product_edit/{id}', [AdminController::class, 'product_update']);
