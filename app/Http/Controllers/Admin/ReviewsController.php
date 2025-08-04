<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function reviewView(){
        $user = Auth::user();

        // Get all reviews for this user
        $reviewUser = Reviews::where('user_id', $user->id)->with('hotel')->get();

        return view('admin.pages.review', [
            'title' => 'reviewView',
            'reviews' => $reviewUser,
        ]);
    }
}
