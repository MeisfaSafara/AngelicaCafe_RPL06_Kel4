<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::all();
        return view('admin.review',[
            'dataReview' => $reviews
        ]);
    }

    public function addReview($id){
        return view('profile/addReview', ['id' => $id]);
    }

    public function storeReview($id, Request $request){
        $validatedData = $request->validate([
            'comment' => 'required|string',
        ]);

        $review = Review::create([
            'user_id' => Auth::user()->id,
            'order_id' => $id,
            'comment' => $validatedData['comment'],
        ]);

        return redirect()->route('profile.transaction');
    }

    public function detail($id){
        $detailReview = Review::find($id);

        $orderId  = $detailReview->order_id;

        $detailOrder = OrderDetail::where('order_id',$orderId)->get();


        return view('admin.detailReview',[
            'detailOrder' => $detailOrder,
            'detailReview' => $detailReview
        ]);
        
        
    }
}