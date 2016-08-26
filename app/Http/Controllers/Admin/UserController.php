<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events\UserRegistration;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

use Validator;
use Hash;
use Auth;

class UserController extends Controller
{
    protected $user;
    function __construct(UserRepository $user)
    {
        $this->middleware('auth')->except('getNewUserForm', 'makeRegistration', 'login', 'makeLogin');
        $this->user = $user;
    }

    public function getNewUserForm()
    {
        return view('admin.reg');
    }

    public function makeRegistration(Request $req)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:5|same:repassword'
        ];

        $valid = Validator::make($req->input(), $rules);
        if($valid->fails()) {
            return redirect()->back()->withErrors($valid);
        }

        $data = [
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => Hash::make($req->input('password')),
            'role' => 'author'
        ];

        if($user = $this->user->create($data)) {
            //event(new UserRegistration($user));
            return redirect()->back()->with('msg', 'success');
        }
        
    }

    public function login()
    {
        return view('admin.login');
    }

    public function makeLogin(Request $req)
    {
        if(Auth::attempt(['email'=>$req->input('email'), 'password'=>$req->input('password')], $req->input('remember'))){
            return redirect('/');
        }

        return redirect()->back();
    }
}
