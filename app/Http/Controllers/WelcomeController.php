<?php

namespace Sistema\Http\Controllers;

use Illuminate\Http\Request;
use Sistema\Comments;

class WelcomeController extends Controller
{
	/**
	* Show the application dashboard.
	*
	* @return \Illuminate\Contracts\Support\Renderable
	*/
	public function index()
	{
		$comments = Comments::all()->reverse();
		$total = Comments::all()->count();

		return view('welcome', compact('comments', 'total'));
	}
}