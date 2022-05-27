<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\factories\Product;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //\App\Models\Product::factory(10)->create();
         //\App\Models\User::factory(10)->create();

         //\App\Models\Product::factory()->create([
          // 'name' => 'Test User',
          //  'email' => 'test@example.com',
       // ]);
       // $this->call(ProductTableSeeder::class);*/
       $this->call(ProductTableSeeder::class);
    }
}
