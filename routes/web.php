<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AiapplicationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ComponentspageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TriageController;

use App\Http\Controllers\FormsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CryptocurrencyController;
use Inertia\Inertia;
Route::get('/', function () {
    return Inertia::render('Enterance');
});

Route::post('/login', [DashboardController::class, 'login']);
Route::post('/logout', [DashboardController::class, 'logout']);
// Admin (Blade)
Route::prefix('admin')->middleware(['web'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::resource('triages', TriageController::class);

    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/patient_queue', 'index2')->name('patient_queue');
            Route::post('/add-queue', 'store')->name('add_queue');
            Route::post('/change-state', 'updateQueueState')->name('change_state');
        });
    });
});