<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function reviewView(){
        return view('admin.pages.review',
            ['title' => 'reviewView']
        );
    }
}
