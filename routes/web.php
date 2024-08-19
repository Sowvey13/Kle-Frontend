<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get("/", [AuthController::class, "login"])->name("login");
Route::post("/", [AuthController::class, "loginPost"])->name("login.post");

Route::get("/registration", [AuthController::class, "registration"])->name("registration");
Route::post('/registration', [AuthController::class, 'registrationPost'])->name('registrationPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/index', [AuthController::class, 'index'])->name('index');

Route::get('/products/product_detail/{id}', [ProductController::class, 'ProductDetail'])->name('products.product_detail');
Route::get("/products/create", [ProductController::class, "CreateShow"])->name("products.create");
Route::post("/products/create", [ProductController::class, "create"])->name("create");
Route::get("/products", [ProductController::class,"productsAll"])->name("products.store");
Route::put("/products/update/{id}", [ProductController::class, "update"])->name("products.update");
Route::get("/products/show/{id}", [ProductController::class, "show"])->name("products.show");
Route::delete("/products/delete/{id}", [ProductController::class, "destroy"])->name("products.destroy");
 
Route::get('login_error', function () {
    return view('login_error');
})->name('login_error');  
    







