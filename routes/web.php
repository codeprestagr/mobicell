<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', App\Livewire\Dashboard\Index::class)->name('dashboard');
    Route::middleware(['dynamic.permission'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('stores/index', \App\Livewire\Stores\Index::class)->name('stores.index');
        Route::get('stores/create', \App\Livewire\Stores\Form::class)->name('stores.create');
        Route::get('stores/{store}/edit', \App\Livewire\Stores\Form::class)->name('stores.edit');


        Route::get('roles/index',\App\Livewire\Team\Roles\Index::class)->name('roles.index');
        Route::get('roles/create',\App\Livewire\Team\Roles\Form::class)->name('roles.create');
        Route::get('roles/{role}/edit', \App\Livewire\Team\Roles\Form::class)->name('roles.edit');
        Route::get('roles/{role}/permissions', \App\Livewire\Team\Roles\GivePermission::class)->name('roles.permissions');


        Route::get('employees/index',\App\Livewire\Team\Employees\Index::class)->name('employees.index');
        Route::get('employees/create',\App\Livewire\Team\Employees\Form::class)->name('employees.create');
        Route::get('employees/{employee}/edit',\App\Livewire\Team\Employees\Form::class)->name('employees.edit');


        Route::get('permissions/index',\App\Livewire\Team\Permissions\Index::class)->name('permissions.index');
        Route::get('permissions/create',\App\Livewire\Team\Permissions\Form::class)->name('permissions.create');
        Route::get('permissions/{permission}/edit',\App\Livewire\Team\Permissions\Form::class)->name('permissions.edit');


    });
});

require __DIR__.'/auth.php';
