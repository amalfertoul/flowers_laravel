<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'phrase' => 'required',
        ]);
    
        $review = Review::create([
            'user_id' => $request->user()->id,
            'phrase' => $request->phrase,
        ]);
    
        return response()->json($review, 201);
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return response()->json(['message' => 'Review deleted']);
    }
}
