<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\GeneralMembersController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteProfileController;
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

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
        Route::resource('user', UserController::class);

    // Website Profile
        Route::get('/website-profile', function () {
            return view('website_profiles.index');
        })->name('website-profile.index');
        Route::post('/website-profile', [WebsiteProfileController::class, 'store'])->name('website-profile.store');

    // Divisions
        Route::resource('/divisi-jabatan', DivisionController::class);

    // Members
        Route::resource('/anggota', MemberController::class);

    // General Members
        Route::resource('/anggota-umum', GeneralMembersController::class);

});

Route::get('/pendataan-mahasiswa-informatika', function () {
    return view('general_members.frontend.create');
});

Route::post('/pendataan-mahasiswa-informatika', [GeneralMembersController::class, 'store']);

require __DIR__.'/auth.php';
