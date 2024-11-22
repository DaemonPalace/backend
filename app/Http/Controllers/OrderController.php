<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::with('products')->get();
            return response()->json(['orders' => $orders], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'ccn' => 'required|numeric',
            'exp' => 'required|string',
            'cvv' => 'required|numeric',
            'total' => 'required|string',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();
        
        try {
            // Create the order
            $order = Order::create($request->except('products'));

            // Prepare products data for the pivot table
            $productsData = [];
            foreach ($request->products as $product) {
                $productsData[$product['id']] = ['quantity' => $product['quantity']];
            }

            // Attach products to the order
            $order->products()->attach($productsData);

            DB::commit();

            // Load the products relationship for the response
            $order->load('products');

            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'message' => 'Error creating order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $order = Order::with('products')->findOrFail($id);
            return response()->json(['order' => $order], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'phone' => 'string|max:255',
            'address' => 'string',
            'ccn' => 'numeric',
            'exp' => 'string',
            'cvv' => 'numeric',
            'total' => 'string',
            'products' => 'array',
            'products.*.id' => 'exists:products,id',
            'products.*.quantity' => 'integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {
            $order = Order::findOrFail($id);
            $order->update($request->except('products'));

            if ($request->has('products')) {
                $productsData = [];
                foreach ($request->products as $product) {
                    $productsData[$product['id']] = ['quantity' => $product['quantity']];
                }
                
                $order->products()->sync($productsData);
            }

            DB::commit();

            $order->load('products');

            return response()->json([
                'message' => 'Order updated successfully',
                'order' => $order
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'message' => 'Error updating order',
                'error' => $e->getMessage()
            ], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $order = Order::findOrFail($id);
            
            // Delete the relationships first
            $order->products()->detach();
            
            // Then delete the order
            $order->delete();

            DB::commit();

            return response()->json([
                'message' => 'Order deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'message' => 'Error deleting order',
                'error' => $e->getMessage()
            ], $e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ? 404 : 500);
        }
    }
}