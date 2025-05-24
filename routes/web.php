<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EndpointController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return redirect()->route($request->user() ? 'dashboard' : 'login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard/{site?}', DashboardController::class)->name('dashboard');
    Route::get('/endpoint/{endpoint}', EndpointController::class)->name('endpoint');
});
