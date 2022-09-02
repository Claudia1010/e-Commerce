<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Recuperar todos los orders, para poder ver su estado. (ADMIN)
// Recuperar los orders de un usuario. (para que un usuario pueda ver sus pedidos.
// Cambiar el estado de un pedido. En tu caso como lo has hecho el estado es un booleano, pues para pasarlo de false a true. Este enpoint solo lo podria hacer un admin.

Route::get('/', function () {return ['Bienvenido a mi api'];});

//no token required
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//routes for users with token
Route::group(["middleware" => "jwt.auth"] , function() {
    Route::get('/myProfile', [AuthController::class, 'getProfile']);
    Route::post('/logout', [AuthController::class, 'logout']); 
    Route::put('/updateProfile', [AuthController::class, 'updateProfile']);
    Route::delete('/deleteProfile', [AuthController::class, 'deleteProfile']); 
});

Route::group(["middleware" => "jwt.auth"] , function() {
    Route::post('/addOrder', [OrderController::class, 'addOrder']);
    Route::delete('/deleteOrderById/{id}', [OrderController::class, 'deleteOrderById']);
}); 


//routes with admin token
Route::group(["middleware" => ["jwt.auth", "isAdmin"]] , function() {
    Route::post('/promoteToAdmin/{id}', [UserController::class, 'userToAdmin']);
    Route::post('/degradeToUser/{id}', [UserController::class, 'adminToUser']);
    Route::get('/getAllUsers', [UserController::class, 'getAllUsers']);
}); 

Route::group(["middleware" => ["jwt.auth", "isAdmin"]] , function() {
    Route::post('/createCategory', [CategoryController::class, 'createCategory']);
    Route::put('/updateCategoryById/{id}', [CategoryController::class, 'updateCategoryById']);
    Route::delete('/deleteCategoryById/{id}', [CategoryController::class, 'deleteCategoryById']);
}); 

Route::group(["middleware" => ["jwt.auth", "isAdmin"]] , function() {
    Route::post('/addProduct', [ProductController::class, 'addProduct']);
    Route::put('/updateProductById/{id}', [ProductController::class, 'updateProductById']);
    Route::delete('/deleteProductById/{id}', [ProductController::class, 'deleteProductById']);  
});  

