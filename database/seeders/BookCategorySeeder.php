<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 150; $i++) {
            DB::table('book_category')->insert([
                'book_id' => fake()->numberBetween(1, 45),
                'category_id' => fake()->numberBetween(1, 8),
            ]);
        }
    }
}
