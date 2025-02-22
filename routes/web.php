<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\WhatWeDoController;
use App\Http\Controllers\WhyUsController;
use App\Models\Partner;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;





Route::get('/', [welcomeController::class, "index"]);
Route::get('/locale/{locale}', function ($locale) {
    $availableLocales = ['en', 'ar']; // اللغات المتاحة
    if (in_array($locale, $availableLocales)) {
        Session::put('locale', $locale);
        Session::save();
    }
    return redirect()->back();
})->name('UserSetLocale');


Route::middleware(['guest:web'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/login', [AuthController::class, 'getLogin'])->name('auth.getLogin');
        Route::post('/authLogin', [AuthController::class, 'Login'])->name('auth.login');
    });
});


Route::middleware(['role:admin', 'auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/', function () {
            return view('Admin.dashboard');
        })->name('dashboard');
        Route::post('/Logout', [AuthController::class, 'Logout'])->name('auth.Logout');

        // --------------------- User Controll 
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

        // -----------------------languages 
        Route::get('/locale/{locale}', function ($locale) {
            $availableLocales = ['en', 'ar']; // اللغات المتاحة
            if (in_array($locale, $availableLocales)) {
                Session::put('locale', $locale);
                Session::save();
            }
            return redirect()->back();
        })->name('setLocale'); // تعيين اسم للـ Route

        // ---------------------why_us -------------------
        Route::resource('whyus', WhyUsController::class);

        // ---------------------Service -------------------
        Route::resource('services', ServiceController::class);
        // ---------------------Service -------------------
        Route::resource('partners', PartnerController::class);

        Route::post('/upload-files', [FileController::class, 'upload'])->name('partner.upload.files');
        Route::delete('/delete-file/{id}', [FileController::class, 'deleteFile'])->name('partner.deleteFile');;
        // ---------------------WhatWeDo -------------------
        Route::resource('WhatWeDos', WhatWeDoController::class);
    });
});
