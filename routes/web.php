<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

    Route::prefix('members')->group(function () {
        Route::redirect('/', '/');
        
        Route::get('/create', [MemberController::class, 'create'])->name('members.create'); // GET request for create form
        Route::post('/', [MemberController::class, 'store'])->name('members.store'); // POST request for storing a new member
        Route::get('/{uuid}', [MemberController::class, 'showByUuid'])->name('members.show'); // GET request for showing a member by UUID
        Route::get('/{uuid}/edit', [MemberController::class, 'edit'])->name('members.edit'); // GET request for editing a member by UUID
        Route::put('/{uuid}', [MemberController::class, 'update'])->name('members.update'); // PUT request for updating a member by UUID
        Route::delete('/{uuid}', [MemberController::class, 'destroy'])->name('members.destroy'); // DELETE request for deleting a member by UUID
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
