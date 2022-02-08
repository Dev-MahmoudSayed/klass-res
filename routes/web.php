<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Route::get("/",[HomeController::class,"index"]);
Route::get("/redirects",[HomeController::class,"redirects"]);


// user & admin
Route::get("/users",[AdminController::class,"user"]);
Route::get("deleteUser/{id}",[AdminController::class,"deleteUser"]);


// menu
Route::get("/foodMenu",[AdminController::class,"foodMenu"]);
Route::get("/showMenu",[AdminController::class,"showMenu"]);
Route::get("/deleteMenu/{id}",[AdminController::class,"deleteMenu"]);
Route::get("/updateView/{id}",[AdminController::class,"updateView"]);
Route::post("/update/{id}",[AdminController::class,"update"]);
Route::post("/uploadFood",[AdminController::class,"upload"]);


// contact 
Route::get("/viewCon",[AdminController::class,"viewCon"]);
Route::post("/contact",[AdminController::class,"contact"]);
Route::get("deleteCon/{id}",[AdminController::class,"deleteCon"]);

// chef
Route::get("/viewChef",[AdminController::class,"viewChef"]);
Route::post("/uploadChef",[AdminController::class,"uploadChef"]);
Route::get("/editChef/{id}",[AdminController::class,"editChef"]);
Route::post("/updatedChef/{id}",[AdminController::class,"updatedChef"]);
Route::get("/deleteChef/{id}",[AdminController::class,"deleteChef"]);


// cart route
Route::post("/addCart/{id}",[HomeController::class,"addCart"]);
Route::get("/showCart/{id}",[HomeController::class,"showCart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);







Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
