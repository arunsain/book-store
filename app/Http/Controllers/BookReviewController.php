<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Jobs\SendReviewMailJob;
use Auth;

class BookReviewController extends Controller
{

    public function addReview()
    {
        return view('auth.add-review');
    }

    public function storeReview(Request $request){
        $request->validate([
            'review' => 'required',
            'rating' => 'required',
            
        ]);
        $review  = new Review;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->book_id = $request->book_id;
        $review->user_id = Auth::user()->id;
        $review->save();
        $review =  Review::with(['book','user','book.authors'])->find($review->id);
        dispatch(new SendReviewMailJob($review));
        return redirect()->route('/')->withSuccess('Review  Added  and email successfully');
  
    }
}
