<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a category and product for testing
        $this->category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Electronics products',
            'is_active' => true,
        ]);

        $this->product = Product::create([
            'name' => 'Premium Smart Watch',
            'description' => 'A premium smart watch for tests.',
            'price' => 199.99,
            'stock' => 10,
            'is_active' => true,
            'category_id' => $this->category->id,
        ]);
    }

    /**
     * Test guest can place a direct Cash on Delivery order successfully.
     */
    public function test_guest_can_place_direct_cod_order(): void
    {
        $payload = [
            'customer_name' => 'John Doe',
            'customer_phone' => '01712345678',
            'customer_email' => 'john@example.com',
            'shipping_address' => 'Mirpur, Dhaka, Bangladesh',
            'product_id' => $this->product->id,
            'quantity' => 2,
            'note' => 'Deliver in the afternoon',
        ];

        $response = $this->post(route('orders.storeDirect'), $payload);

        // Assert redirect to success page
        $order = Order::first();
        $this->assertNotNull($order);
        $response->assertRedirect(route('orders.success', ['order_number' => $order->order_number]));

        // Assert database records
        $this->assertDatabaseHas('orders', [
            'customer_name' => 'John Doe',
            'customer_phone' => '01712345678',
            'shipping_address' => 'Mirpur, Dhaka, Bangladesh',
            'status' => 'pending',
            'total_amount' => 399.98,
        ]);

        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'product_id' => $this->product->id,
            'quantity' => 2,
            'price' => 199.99,
        ]);

        // Assert stock decrement
        $this->product->refresh();
        $this->assertEquals(8, $this->product->stock);
    }

    /**
     * Test direct COD order validation errors.
     */
    public function test_direct_cod_order_validation_fails(): void
    {
        $payload = [
            'customer_name' => '', // Empty name
            'customer_phone' => '01712345678',
            'shipping_address' => 'Mirpur, Dhaka',
            'product_id' => $this->product->id,
            'quantity' => 0, // Invalid quantity
        ];

        $response = $this->post(route('orders.storeDirect'), $payload);

        $response->assertSessionHasErrors(['customer_name', 'quantity']);
        $this->assertDatabaseEmpty('orders');
    }

    /**
     * Test admin can update order status.
     */
    public function test_admin_can_update_order_status(): void
    {
        // Create an order
        $order = Order::create([
            'order_number' => 'ORD-123456',
            'customer_name' => 'Alice Smith',
            'customer_phone' => '01912345678',
            'total_amount' => 199.99,
            'shipping_address' => 'Gulshan, Dhaka',
            'status' => 'pending',
        ]);

        // Create admin user
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        // Act as admin and update status to processing
        $response = $this->actingAs($admin)
            ->put(route('admin.orders.updateStatus', $order), [
                'status' => 'processing',
            ]);

        $response->assertRedirect();
        
        $order->refresh();
        $this->assertEquals('processing', $order->status);
    }

    /**
     * Test non-admin cannot update order status.
     */
    public function test_non_admin_cannot_update_order_status(): void
    {
        $order = Order::create([
            'order_number' => 'ORD-123456',
            'customer_name' => 'Alice Smith',
            'customer_phone' => '01912345678',
            'total_amount' => 199.99,
            'shipping_address' => 'Gulshan, Dhaka',
            'status' => 'pending',
        ]);

        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $response = $this->actingAs($user)
            ->put(route('admin.orders.updateStatus', $order), [
                'status' => 'processing',
            ]);

        $response->assertStatus(403);
        
        $order->refresh();
        $this->assertEquals('pending', $order->status);
    }
}
