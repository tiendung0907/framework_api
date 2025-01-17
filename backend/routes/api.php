<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/**
 * Protected routes
 */
Route::middleware(['auth:sanctum'])
    ->group(function () {

        Route::apiResource('tickets', TicketController::class)
            ->except(['show']);

        Route::prefix('tickets')
            ->controller(TicketController::class)
            ->group(function () {
                Route::get('/GetAll', 'index');
                Route::get('/getAllWithPagination', 'getAllWithPagination');
            });

    });

/**
 * Public routes
 */

Route::controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login')
            ->name('login');
    });

