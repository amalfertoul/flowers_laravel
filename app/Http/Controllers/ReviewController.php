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
            'user_id' => 'required|exists:users,id',
            'phrase' => 'required',
        ]);

        $review = Review::create($request->all());
        return response()->json($review, 201);
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return response()->json(['message' => 'Review deleted']);
    }
}
