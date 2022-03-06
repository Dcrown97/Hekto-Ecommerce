<?php

use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::match(["GET", "POST"], '/', [MainController::class, "upload_product"]);
Route::match(["GET", "POST"], '/faq', [MainController::class, "upload_faq"]);
Route::match(["GET", "POST"], '/about', [MainController::class, "About"]);
Route::match(["GET", "POST"], '/blog', [MainController::class, "Blog"]);
Route::match(["GET", "POST"], '/brand', [MainController::class, "Brand"]);
Route::match(["GET", "POST"], '/category', [MainController::class, "Category"]);
