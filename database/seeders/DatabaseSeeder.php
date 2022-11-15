<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Product::create([
            'title' => 'Куртка',
            'price' => 2000,
            'quantity' => 20
        ]);

        Product::create([
            'title' => 'Футболка с крэветка',
            'price' => 1000,
            'quantity' => 3
        ]);
    }
}
