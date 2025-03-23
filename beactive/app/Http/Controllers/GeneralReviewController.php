<?php

namespace App\Http\Controllers;

use App\Models\GeneralReview;
use Illuminate\Http\Request;

class GeneralReviewController extends Controller
{
     public function create()
     {
         return view('generalreviews');
     }

     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'review' => 'required|string',
         ]);
 

         GeneralReview::create([
             'name' => $request->input('name'),
             'review' => $request->input('review'),
         ]);
 
 
         return redirect()->route('general.reviews.create')->with('message', 'Thank you for your review!');
     }
}
