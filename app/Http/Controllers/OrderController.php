<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    // Display a listing of the orders
    public function index()
    {
        try {
            $orders = Order::with('products')->get(); // Eager load related products
            return response()->json($orders);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'ccn' => 'required|string',
            'exp' => 'required|string',
            'cvv' => 'required|numeric',
            'total' => 'required|numeric',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'state' => 'required|boolean'
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
    \Log::info('Update request received', [
        'id' => $id,
        'state' => $request->input('state'),
        'all_input' => $request->all()
    ]);

    try {
        $order = Order::findOrFail($id);
        $request->validate([
            'state' => 'required',
        ]);

        $order->state = $request->input('state');
        $order->save();

        return response()->json(['message' => 'Order state updated successfully'], 200);
    } catch (\Exception $e) {
        \Log::error('Update error: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
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