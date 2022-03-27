<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //womens
        for ($i=1; $i < 12; $i++) { 
            Product::create([
                'name' => 'Womens '.$i,
                'slug' => 'women-'.$i,
                'details' => 'women\'s hoddie',
                'description' => 'Lorem '.$i.' ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final.',
                'product_code' => '-00',
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ]);
        }

        //mens
        for ($i=1; $i < 12; $i++) { 
            Product::create([
                'name' => 'Mens '.$i,
                'slug' => 'men-'.$i,
                'details' => 'men\'s hoddie',
                'description' => 'Lorem '.$i.' ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final.',
                'product_code' => '-00',
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ]);
        }

        //kids
        for ($i=1; $i < 12; $i++) { 
            Product::create([
                'name' => 'Kids '.$i,
                'slug' => 'kid-'.$i,
                'details' => 'kid\'s hoddie',
                'description' => 'Lorem '.$i.' ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final.',
                'product_code' => '-00',
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ]);
        }

        
        //home goods
        for ($i=1; $i < 12; $i++) { 
            Product::create([
                'name' => 'Home Goods '.$i,
                'slug' => 'homegood-'.$i,
                'details' => 'kihomegood',
                'description' => 'Lorem '.$i.' ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final.',
                'product_code' => '-00',
                'price' => rand(999, 9999),
                'quantity' => rand(1, 10)
            ]);
        }
    }
}
