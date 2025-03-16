<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function showReviewForm($productId)
    {
        return view('reviews.add', ['productId' => $productId]);
    }

    public function submitReview(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'product_id' => 'required|integer',
        ]);

        Review::create([
            'product_id' => $request->input('product_id'),
            'customer_name' => $request->input('customer_name'),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('product.show', ['id' => $request->input('product_id')])
            ->with('success', 'Review submitted successfully!');
    }

    public function showReviews($productId)
    {
        $reviews = Review::where('product_id', $productId)->get();
        return view('reviews.index', compact('reviews', 'productId'));
    }
}
