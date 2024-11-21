<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Get all products
    public function index()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }

    // Store a new product
    public function store(Request $request)
    {
        return response()->json(['product' => $request->all()]);
    }
}