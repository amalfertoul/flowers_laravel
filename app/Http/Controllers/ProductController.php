<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
    
        if (!$user || !$user->isAdmin) {
            return response()->json(['message' => 'Access denied'], 403);
        }
    
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:12560', // maximum 12.56MB size
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
        }
    
        $product = Product::create([
            'name' => $request->name,
            'image' => $imagePath ?? null,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
    
        return response()->json($product, 201);
    }
    
    public function update(Request $request, $id)
    {
        $user = auth()->user();
    
        if (!$user || !$user->isAdmin) {
            return response()->json(['message' => 'Access denied'], 403);
        }
    
        $product = Product::findOrFail($id);
    
        $request->validate([
            'name' => 'sometimes|required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:12560',
            'price' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
        ]);
    
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $image = $request->file('image');
            $product->image = $image->store('products', 'public');
        }
    
        $product->update($request->only(['name', 'price', 'stock']));
    
        return response()->json($product);
    }
    
    public function destroy($id)
    {
        $user = auth()->user();
    
        if (!$user || !$user->isAdmin) {
            return response()->json(['message' => 'Access denied'], 403);
        }
    
        $product = Product::findOrFail($id);
    
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
    
        $product->delete();
    
        return response()->json(['message' => 'Product deleted']);
    }
}

