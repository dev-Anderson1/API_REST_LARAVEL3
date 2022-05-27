<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;  

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\Models\Product::class, 10)->create();
     /*Product::create([
     'name'=> 'Carlos Ferreira',
     'price'=> 100,
     'description'=> 'teste',
      ]);*/
    }
}
