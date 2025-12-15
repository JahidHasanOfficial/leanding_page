<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and gadgets',
                'is_active' => true,
            ],
            [
                'name' => 'Computers & Accessories',
                'description' => 'Computer hardware and accessories',
                'is_active' => true,
            ],
            [
                'name' => 'Office Supplies',
                'description' => 'Office equipment and supplies',
                'is_active' => true,
            ],
            [
                'name' => 'Audio & Video',
                'description' => 'Audio and video equipment',
                'is_active' => true,
            ],
            [
                'name' => 'Home & Living',
                'description' => 'Home improvement and living essentials',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $categoryData) {
            // Generate slug from name
            $categoryData['slug'] = Str::slug($categoryData['name']);
            Category::create($categoryData);
        }
    }
}
