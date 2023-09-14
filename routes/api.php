<?php

use App\Http\Controllers\API\WebsiteProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route:get('website-profile');
Route::middleware(['cors'])->group(function () {
    Route::get('website-profile', [WebsiteProfileController::class, 'index'])->name('api.website-profile.index');
});
