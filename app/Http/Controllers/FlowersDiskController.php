<?php

namespace App\Http\Controllers;

use App\Models\FlowersDisk;
use Illuminate\Http\Request;

class FlowersDiskController extends Controller
{
    public function index()
    {
        return response()->json(FlowersDisk::all(), 200);
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user || !$user->isAdmin) {
            return response()->json(['message' => 'Access denied'], 403);
        }
    
        $flower = FlowersDisk::findOrFail($id);
    
        $request->validate([
            'name' => 'sometimes|required',
            'small_img' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:12560',
            'large_img' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:12560',
            'description' => 'sometimes|required',
        ]);
    
        if ($request->hasFile('small_img')) {
            if ($flower->small_img) {
                Storage::disk('public')->delete($flower->small_img);
            }
            $smallImg = $request->file('small_img');
            $smallImgName = 'small_img_' . time() . '.' . $smallImg->getClientOriginalExtension();
            $flower->small_img = $smallImg->storeAs('flowers', $smallImgName, 'public');
        }
    
        if ($request->hasFile('large_img')) {
            if ($flower->large_img) {
                Storage::disk('public')->delete($flower->large_img);
            }
            $largeImg = $request->file('large_img');
            $largeImgName = 'large_img_' . time() . '.' . $largeImg->getClientOriginalExtension();
            $flower->large_img = $largeImg->storeAs('flowers', $largeImgName, 'public');
        }
    
        $flower->update($request->only(['name', 'description']));
    
        return response()->json($flower, 200);
    }
    
}
