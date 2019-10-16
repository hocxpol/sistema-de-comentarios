<?php

namespace Sistema\Http\Controllers;

use Illuminate\Http\Request;
use Sistema\Comments;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
	// $comments = Comments::all();
	// $total = Comments::all()->count();
	// return view('comments', compact('comments', 'total'));

		$user = Auth::user();
		$user_id = $user->id;

		$comments = Comments::all()->where('user_id', $user_id);
		$total = $comments->count();

	// return $comments;
		return view('comments', compact('comments', 'total'));
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		return redirect('/');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		$this->validate($request,[
			'message' => 'required|min:3|max:1024',
		]);

		$user = Auth::user();
		if((Auth::check()) || ($user->type == 0))
		{
			$comments = new Comments;
			$comments->message = $request->message;

			$user = Auth::user();
			$comments->user_id = $user->id;

			$comments->save();
			return redirect('/')->with('success', 'Comentário criado com sucesso!');
		}
		else {
			return redirect('/')->with('error', 'Sem permissão!');
		}
	}

	/**
	* Display the specified resource.
	*
	* @param  int $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{

	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		$comments = Comments::findOrFail($id);
		return view('comment-edit', compact('comments'));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id)
	{
		$this->validate($request,[
			'message' => 'required|min:3|max:1024',
		]);

		$comments = Comments::findOrFail($id);
		$comments->message = $request->message;

		$user = Auth::user();
		if(($user->id == $comments->user_id) || ($user->type == 0))
		{
			$comments->save();
			return redirect()->route('comments.edit', $id)->with('success', 'Comentário alterado com sucesso!');
		}
		else
		{
			return redirect()->route('comments.edit', $id)->with('error', 'Sem permissão!');
		}
	}
	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
		$comments = Comments::findOrFail($id);

		$user = Auth::user();
		if(($user->id == $comments->user_id) || ($user->type == 0))
		{
			$comments->delete();
			return back()->with('success', 'Comentário excluído com sucesso!');
		}
		else
		{
			return back()->with('error', 'Sem permissão!');   
		}
	}
}
