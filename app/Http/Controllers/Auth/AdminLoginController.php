<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('admin.admin_login');
    }

    public function showRegisterForm(){
        return view('admin.admin_register');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $validator=$this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.index'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withErrors($validator)->withInput($request->only('email', 'remember'));
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|between:5,20|alpha',
            'email' => 'required|email',
            'password'=>'required',
            'password2'=>'same:password',
            'type' => 'required|in:0,1'
        ]);
        $admin=Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role'=>$request->input('type')
        ]);
        if (Auth::guard('admin')->attempt(['email' => $admin->email, 'password' => $request->input('password')])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.index'));
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended(route('admin.login'));
    }
}