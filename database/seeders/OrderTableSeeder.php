<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make sure we have some products to work with
        $products = Product::all();
        
        if ($products->isEmpty()) {
            throw new \Exception('Please seed products table first');
        }

        // Create some sample orders
        $orders = [
            [
                'name' => 'John Doe',
                'phone' => '555-0123',
                'address' => '123 Main St, Anytown, ST 12345',
                'ccn' => 4242424242424242,
                'exp' => '12/25',
                'cvv' => 123,
                'total' => '45.90',
                'products' => [
                    ['id' => 1, 'quantity' => 2],
                    ['id' => 2, 'quantity' => 1],
                ],
                'state' => '0'
            ],
            [
                'name' => 'Jane Smith',
                'phone' => '555-0124',
                'address' => '456 Oak Ave, Somewhere, ST 12346',
                'ccn' => 4111111111111111,
                'exp' => '01/26',
                'cvv' => 456,
                'total' => '32.50',
                'products' => [
                    ['id' => 3, 'quantity' => 1],
                    ['id' => 4, 'quantity' => 2],
                ],
                'state' => '0'
            ],
            [
                'name' => 'Bob Wilson',
                'phone' => '555-0125',
                'address' => '789 Pine Rd, Elsewhere, ST 12347',
                'ccn' => 5555555555554444,
                'exp' => '03/26',
                'cvv' => 789,
                'total' => '78.25',
                'products' => [
                    ['id' => 1, 'quantity' => 3],
                    ['id' => 3, 'quantity' => 2],
                    ['id' => 5, 'quantity' => 1],
                ],
                'state' => '0'
            ]
        ];

        foreach ($orders as $orderData) {
            $productData = $orderData['products'];
            unset($orderData['products']);

            // Create the order
            $order = Order::create($orderData);

            // Attach products with their quantities
            foreach ($productData as $product) {
                if ($products->pluck('id')->contains($product['id'])) {
                    $order->products()->attach($product['id'], [
                        'quantity' => $product['quantity']
                    ]);
                }
            }
        }
    }
}