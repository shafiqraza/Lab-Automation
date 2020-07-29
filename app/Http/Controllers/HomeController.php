<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
      $feedback = new Feedback;
      $feedback->firstname  = $request->firstname;
      $feedback->lastname  = $request->lastname;
      $feedback->email  = $request->email;
      $feedback->subject  = $request->subject;
      $feedback->msg  = $request->msg;
      $feedback->save();
      $msg = $request->session()->flash('successMsg','Thank You for your Feedback');
      // $msg = ['success' => 'Thank You for your Feedback'];
      return redirect('/index#contact-section');
    }
}
