<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\AuthenticatedController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TokenMiddleware;

Route::middleware([TokenMiddleware::class])->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
    Route::get('/events', [EventController::class, 'index'])->name('events');

    Route::prefix('members')->group(function () {
        Route::redirect('/', '/');
        
        Route::get('/create', [MemberController::class, 'create'])->name('members.create'); 
        Route::post('/', [MemberController::class, 'store'])->name('members.store'); 
        Route::get('/{uuid}', [MemberController::class, 'showByUuid'])->name('members.show'); 
        Route::get('/{uuid}/edit', [MemberController::class, 'edit'])->name('members.edit'); 
        Route::put('/{uuid}', [MemberController::class, 'update'])->name('members.update'); 
        Route::delete('/{uuid}', [MemberController::class, 'destroy'])->name('members.destroy'); 
    });

    Route::get('logout', [AuthenticatedController::class, 'destroy'])->name('logout');
});

Route::get('login', [AuthenticatedController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedController::class, 'store']);





