<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $latestReview = Review::latest()->first();
        return view('review.index', compact('latestReview'));
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