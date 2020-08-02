<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Feedback;

class FeedbackController extends Controller
{
    
    public function index()
    {
    	$feedbacks = Feedback::all();

    	return view('admin.feedback.index')->with('feedbacks',$feedbacks);
    
    	// return 'Hello';
    }
}
