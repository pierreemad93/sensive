<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = ['food', 'travel', 'fashion', 'financial'];
        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category], [
                'name' => $category
            ]);
        }
    }
}
