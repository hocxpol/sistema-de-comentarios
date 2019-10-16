<?php

namespace Sistema\Http\Controllers;

use Sistema\Users;
use Sistema\Comments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{

	use RegistersUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if((Auth::user() AND Auth::user()->type == 0)) {
    		$users = Users::all();
    		$total = Users::all()->count();
    		return view('users', compact('users', 'total'));
    	}
    	else
    	{
    		return redirect()->route('home');
    	}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('user-insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3|max:50',
    		'email' => 'email|unique:users',
    		'vat_number' => 'max:13',
    		'password' => 'required|confirmed|min:6',
    		'type' => 'required|boolean',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    	$users = new Users;
    	$users->name = $request->name;
    	$users->email = $request->email;
    	$users->type = $request->type;
    	$users->password = Hash::make($request->password);


        if($request->avatar) {
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

            $image_resize = Image::make($request->avatar->getRealPath());              
            $image_resize->fit(300, 300);
            $image_resize->save(public_path('storage/avatars/' .$avatarName));

            $users->avatar = $avatarName;
        }

        $users->avatar = $avatarName;

        $users->save();
        return redirect()->route('users.create')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$user = Users::find($id);
    	return $user->name();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	if((Auth::user()->id == $id) OR (Auth::user()->type == 0)) {
        //Configurar por id
    		$users = Users::findOrFail($id);
    		return view('user-edit', compact('users'));
    	}
    	else
    	{
    		return redirect()->route('home');
    	}
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
        $user = Auth::user();
        if(($user->id == $id) || ($user->type == 0)) {

            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'email',
                'vat_number' => 'max:13',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $users = Users::findOrFail($id); 
            $users->name = $request->name;
            $users->email = $request->email;

            if($request->avatar) 
            {
                $x = Users::find($id);
                $usersImage = public_path("storage/avatars/{$x->avatar}");
                if (File::exists($usersImage)) {
                    unlink($usersImage);
                }

                $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

                $image_resize = Image::make($request->avatar->getRealPath());              
                $image_resize->fit(300, 300);
                $image_resize->save(public_path('storage/avatars/' .$avatarName));

                $users->avatar = $avatarName;
            }

            if($user->type == 0){
                $users->type = $request->type;
                $this->validate($request,[
                    'type' => 'required|boolean',
                ]);
            }

            if($request->password){
                $this->validate($request, [
                    'password' => 'required|confirmed|min:6',
                ]);
                $users->password = Hash::make($request->password);    
            }

            $users->save();
            return redirect()->route('users.edit', $id)->with('success', 'Usuário alterado com sucesso!');
        }
        else
        {
            return redirect()->route('users.edit', $id)->with('error', 'Você não possui permissão!');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$users = Users::findOrFail($id);
    	$users->delete();

    	Users::whereId($id)->delete();

    	return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}