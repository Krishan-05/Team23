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

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'product_id' => 'required|exists:products,id',
        ]);

        $review = new Review();
        $review->product_id = $request->product_id;
        $review->customer_name = $request->customer_name;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();


        return redirect()->route('product.show', ['id' => $request->input('product_id')])
            ->with('success', 'Review submitted successfully!');
    }

    public function showReviews($productId)
    {
        $reviews = Review::where('product_id', $productId)->get();
        return view('reviews.index', compact('reviews', 'productId'));
    }
}
