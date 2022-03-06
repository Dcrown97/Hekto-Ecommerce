<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::match(["GET", "POST"], '/products', [MainController::class, "products"]);
Route::match(["GET", "POST"], '/abouts', [MainController::class, "Abouts"]);
Route::match(["GET", "POST"], '/single_product/{id}', [MainController::class, "products_single"]);
Route::match(["GET", "POST"], '/faqs', [MainController::class, "faqs"]);
Route::match(["GET", "POST"], '/add_question', [MainController::class, "add_question"]);
Route::match(["GET", "POST"], '/register', [MainController::class, "Register"]);
Route::match(["GET", "POST"], '/login', [MainController::class, "Login"]);
Route::match(["GET", "POST"], '/shipping', [MainController::class, "ShippingInfo"]);
Route::match(["GET", "POST"], '/updateshippings/{user_id}', [MainController::class, "updateShippings"]);
Route::match(["GET", "POST"], '/payment', [MainController::class, "Payment"]);
Route::match(["GET", "POST", "PUT"], '/payments/{id}', [MainController::class, "payments"]);
Route::match(["GET", "POST"], '/blogs', [MainController::class, "Blogs"]);
Route::match(["GET", "POST"], '/shipping/{user_id}', [MainController::class, "Shipping"]);
Route::match(["GET", "POST"], '/ship', [MainController::class, "Ship"]);


Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'Maincontroller@getAuthenticatedUser');
       
    });
