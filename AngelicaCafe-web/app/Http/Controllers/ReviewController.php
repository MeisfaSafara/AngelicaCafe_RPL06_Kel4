<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::all();
        return view('review.index', ['review' => $review]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string',
        ]);

        Review::create([
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
    }
}