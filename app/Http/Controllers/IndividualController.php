<?php

namespace App\Http\Controllers;
use Notification;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Individual;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Hash;

class IndividualController extends Controller
{
  use AuthenticatesUsers;

    protected $guardName = 'individual';
    public function register()
    {

      return view('individual.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
              //individual's information
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required',

             //Login information
             'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        Individual::create([
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'phone' => $request->phone,

           
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return redirect('individual/dashboard');
    }

    public function login()
    {

      return view('individual.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string|',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

       // if (Auth::attempt($credentials)) {

        if (Individual::where($credentials)->first()) {
            return redirect()->intended('individual/home');
        }

        return redirect('/individual/login')->with('error', 'invalid credentials');
    }

    public function logout() {
      Auth::logout();

      return redirect('/individual/login');
    }

    public function home()
    {
    //  if (Auth::check()) {

      if (Auth::guard('individual')){
      return view('individual.dashboard');
      }
        return redirect('/individual/login');
      
    }
  }
