<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation and long battery life.',
                'price' => 99.99,
                'stock' => 50,
                'is_active' => true,
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smartwatch with fitness tracking, heart rate monitor, and smartphone connectivity.',
                'price' => 249.99,
                'stock' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Laptop Stand',
                'description' => 'Ergonomic aluminum laptop stand with adjustable height and ventilation.',
                'price' => 49.99,
                'stock' => 75,
                'is_active' => true,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB backlit mechanical keyboard with Cherry MX switches for gaming and typing.',
                'price' => 129.99,
                'stock' => 40,
                'is_active' => true,
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with precision tracking and long battery life.',
                'price' => 39.99,
                'stock' => 60,
                'is_active' => true,
            ],
            [
                'name' => 'USB-C Hub',
                'description' => 'Multi-port USB-C hub with HDMI, USB 3.0, and SD card reader.',
                'price' => 34.99,
                'stock' => 45,
                'is_active' => true,
            ],
            [
                'name' => 'Webcam HD',
                'description' => '1080p HD webcam with autofocus and built-in microphone for video calls.',
                'price' => 79.99,
                'stock' => 35,
                'is_active' => true,
            ],
            [
                'name' => 'Desk Lamp',
                'description' => 'LED desk lamp with adjustable brightness and color temperature.',
                'price' => 29.99,
                'stock' => 80,
                'is_active' => true,
            ],
            [
                'name' => 'Phone Stand',
                'description' => 'Adjustable phone stand compatible with all smartphone sizes.',
                'price' => 14.99,
                'stock' => 100,
                'is_active' => true,
            ],
            [
                'name' => 'Cable Organizer',
                'description' => 'Cable management system to keep your desk tidy and organized.',
                'price' => 19.99,
                'stock' => 90,
                'is_active' => true,
            ],
            [
                'name' => 'Monitor Stand',
                'description' => 'Dual monitor stand with adjustable height and tilt for ergonomic setup.',
                'price' => 89.99,
                'stock' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with 360-degree sound and waterproof design.',
                'price' => 69.99,
                'stock' => 55,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
