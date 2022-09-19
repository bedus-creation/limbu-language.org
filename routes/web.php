<?php

use App\Http\Controllers\TranslationController;
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
    return inertia('front/Index');
});

Route::get("/translations", [TranslationController::class, "index"])->name("translations.index");
Route::get("/translations/create", [TranslationController::class, "create"])->name("translations.create");
Route::post("/translations", [TranslationController::class, "store"])->name("translations.store");
Route::get("/translations/{translation}", [TranslationController::class, "edit"])->name("translations.edit");
Route::put("/translations/{translation}", [TranslationController::class, "update"])->name("translations.update");
