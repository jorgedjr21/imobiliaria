<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Input;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		//
            $user = Auth::user();
            $users = User::all();
            return view('users.index', compact('users','user'));
	}


    public function login(){
        if(Auth::user()) {
            $id = Auth::user()->id;
            return Redirect::route('users.show',compact('id'));
        }else {
            return view('login.index');
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::route('page.index');

    }

    public function authenticate(){

        $input = Input::all();
        $validator = Validator::make($input,
            [
                'email'     =>  'required|email',
                'password'  =>  'required',
            ],
            [
                'required'  => 'The :attribute is required.',
            ]
        );

        if($validator->fails()){
            $error = $validator->messages();
            return Redirect::route('users.login')->withErrors($validator)->withInput(Input::except('password'));
        }else{
            $email = Input::get('email');
            $password = Input::get('password');
            $remember = (Input::has('remember')) ? true : false;

            if(Auth::attempt( ['email'=>$email,'password'=>$password],$remember )){
                $id = Auth::user()->id;
                return Redirect::route('users.show',compact('id'));
            }
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //
        $user = (Auth::user())? Auth::user(): null;

        return view('users.create', compact('user'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //
        $input = Input::all();

        $validator = Validator::make($input,
            [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password'
            ],
            [
                'required' => 'The :attribute is really important.',
                'same' => 'The :others must match.'
            ]
        );


        if ($validator->fails()) {
            $error = $validator->messages();

            if(!Auth::user()){
                return Redirect::to('/')->withErrors($validator)->withInput(Input::except('password', 'password_confirm'));
            }
            return Redirect::to('users')->withErrors($validator)->withInput(Input::except('password', 'password_confirm'));

        } else {
            //User::create($input);
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            $user->save();
            return Redirect::route('users.index')->with('success', 'User ' . $user->name . ' created with success');
        }
    }



	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show()
	{
		//

        $user = Auth::user();
        return view('users.profile', compact('user'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $user = User::find($id);
        return view('users.edit',compact('id','user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $user = User::find($id);
        $input = Input::all();
        $validator = Validator::make($input,
            [
                'name'      =>  'required|min:5',
                'email'     =>  'required|email',
                'password'  =>  'required',
                'password_confirmation'  => 'required|same:password'
            ],
            [
                'required'  => 'The :attribute is really important.',
                'same'      => 'The :others must match.'
            ]
        );
        if($validator->fails()){
            $error = $validator->messages();

            return Redirect::to("users/{$id}")->withErrors($validator)->withInput(Input::except('password','password_confirm'));

        }else{
            $user->name  = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            $user->save();
            return Redirect::route('users.index')->with('success','User '.$user->name.' updated with success');

        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $user = User::find($id);
        $user->delete();
        return Redirect::route('users.index')->with('success','User '.$user->name.' deleted with success');
	}

}
