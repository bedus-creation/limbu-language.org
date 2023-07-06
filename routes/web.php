<?php

use App\Http\Controllers\TranslationController;
use App\Models\Translation;
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
    $english     = request()->input('english');
    $translation = Translation::query()->where('english', 'like', "%$english%")->first();

    $nextTranslate = Translation::query()
        ->whereNull('limbu')
        ->first();

    $nextTranslateLink = route('translations.edit', $nextTranslate->id);

    return inertia('front/Index', [
        'limbu'   => $translation?->limbu,
        'english' => $english,
        "nextTranslateLink" => $nextTranslateLink
    ]);
});

Route::get("/translations", [TranslationController::class, "index"])->name("translations.index");
Route::get("/translations/create", [TranslationController::class, "create"])->name("translations.create");
Route::post("/translations", [TranslationController::class, "store"])->name("translations.store");
Route::get("/translations/{translation}", [TranslationController::class, "edit"])->name("translations.edit");
Route::put("/translations/{translation}", [TranslationController::class, "update"])->name("translations.update");

Route::get('translation-exports', [\App\Http\Controllers\TranslationExportController::class, 'index']);
