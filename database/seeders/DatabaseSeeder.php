<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      /**  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); **/

        $routes = collect(Route::getRoutes())->map(function ($route) {
            return $route->getName();
        })->filter(function ($name) {
            return $name;
        })->values();


        foreach ($routes as $route) {
            Permission::firstOrCreate(['name' => $route, 'guard_name' => 'web']);
        }
    }
}
