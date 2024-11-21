use Illuminate\Http\Request;
use App\Models\Order; // Assuming you have an Order model

Route::post('/api/orders', function (Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'ccn' => 'required|integer',
        'exp' => 'required|string|max:10',
        'cvv' => 'required|integer',
        'total' => 'required|numeric',
        'products' => 'required|array',
        'products.*.product_id' => 'required|integer',
        'products.*.quantity' => 'required|integer',
    ]);

    $order = Order::create($validatedData);

    $order->products()->attach(
        collect($validatedData['products'])->map(function ($product) {
            return [
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ];
        })->toArray()
    );

    return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
});

Route::get('api/products',function(){
    $products = Product::all();
    return response()->json($products);
})