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

        Route::get('guarantees/index', App\Livewire\Guarantees\Index::class)->name('guarantees.index');
        Route::get('guarantees/create', App\Livewire\Guarantees\Form::class)->name('guarantees.create');
        Route::get('guarantees/{guarantee}/edit', App\Livewire\Guarantees\Form::class)->name('guarantees.edit');

        Route::get('warehouse/index',\App\Livewire\Guarantees\Warehouse\Index::class)->name('guarantees.warehouse.index');
        Route::get('warehouse/create',\App\Livewire\Guarantees\Warehouse\Form::class)->name('guarantees.warehouse.create');
        Route::get('warehouse/{warehouse}/edit',\App\Livewire\Guarantees\Warehouse\Form::class)->name('guarantees.warehouse.edit');


        Route::get('customers/index',\App\Livewire\Customers\Index::class)->name('customers.index');
        Route::get('customers/create',\App\Livewire\Customers\Form::class)->name('customers.create');
        Route::get('customers/{customer}/edit',\App\Livewire\Customers\Form::class)->name('customers.edit');


        Route::get('catalog/products',\App\Livewire\Data\Catalog\ProductList::class)->name('products.index');
        Route::get('catalog/categories', \App\Livewire\Data\Catalog\CategoryList::class)->name('categories.index');

//        Route::get('sync',\App\Livewire\Sync::class)->name('sync');


        Route::get('erps/index',\App\Livewire\Pylon\Erps\Index::class)->name('erps.index');
        Route::get('erps/create',\App\Livewire\Pylon\Erps\Form::class)->name('erps.create');
        Route::get('erps/{erp}/edit',\App\Livewire\Pylon\Erps\Form::class)->name('erps.edit');

        Route::get('openai/{product}/generate',\App\Livewire\OpenAi\Generate::class)->name('openai.generate');


        Route::get('settings/index',\App\Livewire\Settings\Index::class)->name('settings.index');

        Route::get('cashier',App\Livewire\Cashier\Index::class)->name('cashier');
        Route::get('incomes/categories/index',App\Livewire\Cashier\Incomes\Index::class)->name('incomes.categories.index');
        Route::get('expenses/categories/index',App\Livewire\Cashier\Expenses\Index::class)->name('expenses.categories.index');
        Route::get('incomes/categories/create',\App\Livewire\Cashier\Incomes\Form::class)->name('incomes.categories.create');
        Route::get('expenses/categories/create',\App\Livewire\Cashier\Expenses\Form::class)->name('expenses.categories.create');

        Route::get('expenses/categories/{expense}/edit',\App\Livewire\Cashier\Expenses\Form::class)->name('expenses.categories.edit');
        Route::get('incomes/categories/{income}/edit',\App\Livewire\Cashier\Incomes\Form::class)->name('incomes.categories.edit');


    });
});

require __DIR__.'/auth.php';
