<?php

use Illuminate\Database\Seeder;

class itemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'category_id' => 1,
            'name' => 'Item 01',
            'description' => Str::random(10),
            'url' => 'https://lorempixel.com/500/500/?1',
            'price' => 00.50,
        ]);
    }
}
