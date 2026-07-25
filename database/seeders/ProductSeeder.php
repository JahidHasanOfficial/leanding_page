<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load seeded categories by their slugs
        $electronics = Category::where('slug', 'electronics')->first();
        $computers = Category::where('slug', 'computers-accessories')->first();
        $office = Category::where('slug', 'office-supplies')->first();
        $audio = Category::where('slug', 'audio-video')->first();
        $home = Category::where('slug', 'home-living')->first();

        // Truncate products table first to clear old data without images
        Product::query()->delete();

        $products = [
            [
                'name' => 'Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation and long battery life.',
                'price' => 99.99,
                'stock' => 50,
                'is_active' => true,
                'category_id' => $audio?->id,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smartwatch with fitness tracking, heart rate monitor, and smartphone connectivity.',
                'price' => 249.99,
                'stock' => 30,
                'is_active' => true,
                'category_id' => $electronics?->id,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Laptop Stand',
                'description' => 'Ergonomic aluminum laptop stand with adjustable height and ventilation.',
                'price' => 49.99,
                'stock' => 75,
                'is_active' => true,
                'category_id' => $computers?->id,
                'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB backlit mechanical keyboard with Cherry MX switches for gaming and typing.',
                'price' => 129.99,
                'stock' => 40,
                'is_active' => true,
                'category_id' => $computers?->id,
                'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with precision tracking and long battery life.',
                'price' => 39.99,
                'stock' => 60,
                'is_active' => true,
                'category_id' => $computers?->id,
                'image' => 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'USB-C Hub',
                'description' => 'Multi-port USB-C hub with HDMI, USB 3.0, and SD card reader.',
                'price' => 34.99,
                'stock' => 45,
                'is_active' => true,
                'category_id' => $computers?->id,
                'image' => 'https://images.unsplash.com/photo-1468495244123-6c6c332eeece?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Webcam HD',
                'description' => '1080p HD webcam with autofocus and built-in microphone for video calls.',
                'price' => 79.99,
                'stock' => 35,
                'is_active' => true,
                'category_id' => $audio?->id,
                'image' => 'https://images.unsplash.com/photo-1601944179066-297acd3ad6d6?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Desk Lamp',
                'description' => 'LED desk lamp with adjustable brightness and color temperature.',
                'price' => 29.99,
                'stock' => 80,
                'is_active' => true,
                'category_id' => $office?->id,
                'image' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Phone Stand',
                'description' => 'Adjustable phone stand compatible with all smartphone sizes.',
                'price' => 14.99,
                'stock' => 100,
                'is_active' => true,
                'category_id' => $computers?->id,
                'image' => 'https://images.unsplash.com/photo-1586105251261-72a756497a11?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Cable Organizer',
                'description' => 'Cable management system to keep your desk tidy and organized.',
                'price' => 19.99,
                'stock' => 90,
                'is_active' => true,
                'category_id' => $office?->id,
                'image' => 'https://images.unsplash.com/photo-1558244661-d248897f7bc4?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Monitor Stand',
                'description' => 'Dual monitor stand with adjustable height and tilt for ergonomic setup.',
                'price' => 89.99,
                'stock' => 25,
                'is_active' => true,
                'category_id' => $computers?->id,
                'image' => 'https://images.unsplash.com/photo-1616440347437-b1c73416efc2?w=600&h=450&fit=crop',
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with 360-degree sound and waterproof design.',
                'price' => 69.99,
                'stock' => 55,
                'is_active' => true,
                'category_id' => $audio?->id,
                'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=600&h=450&fit=crop',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
