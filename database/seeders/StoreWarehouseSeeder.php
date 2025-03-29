<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = Store::all();
        $warehouses = Warehouse::all();

        foreach ($stores as $store) {
            $store->warehouses()->attach(
                $warehouses->random(rand(3, 7))->pluck('id'), // Κάθε κατάστημα έχει 3-7 προϊόντα
                ['quantity' => rand(1, 20)] // Τυχαία ποσότητα από 1 έως 20
            );
        }
    }
}
