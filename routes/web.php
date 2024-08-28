<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\BrandController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/admin-panel')->group(
    function () {
        Route::resource('/brands', BrandController::class);
        Route::resource('/categories', CategoryController::class);
    }
);
