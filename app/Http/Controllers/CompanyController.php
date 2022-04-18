<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Hash;

class CompanyController extends Controller
{
    public function register()
    {

      return view('company.register');
    }

    public function storeUser(Request $request)
    {
        // $request->validate([
        //       //company's information
        //     'c_name' => 'required|string|max:255',
        //     'c_address' => 'required|string|max:255',
        //     'c_phone' => 'required|string|max:255',
        //     'c_email' => 'required',

        //    //personal's information
        //      'p_name' => 'required|string|max:255',
        //    'p_positon' => 'required|string|max:255',
        //    'p_phone' => 'required|string|max:255',
        //     'p_email' => 'required|',
                
        //      //Login information
        //      'username' => 'required|string|max:255',
        //     'password' => 'required|string|min:8|confirmed',
        //     'password_confirmation' => 'required',
        // ]);

        $user =  Company::create([
            'c_name' => $request->c_name,
            'c_address' => $request->c_address,
            'c_email' => $request->c_email,
            'c_phone' => $request->c_phone,

            'p_name' => $request->p_name,
            'p_email' => $request->p_email,
            'p_position' => $request->p_position,
            'p_phone' => $request->p_phone,

            'username' => $request->username,
            // 'password' => Hash::make($request->password),
            'password' => $request->password,
        ]);

       return redirect('company/home');
    }

    public function login()
    {

      return view('company.login');
    }

    public function authenticate(Request $request )
    {
        $request->validate([ 
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
       

        $credentials = $request->only('username', 'password');

        
        if (Company::where($credentials)->first()) {
            return redirect()->intended('company/login');
           
        }

        return redirect('/company/login')->with('error', 'invalid credentials');
       
    }

    public function logout() {
      Auth::logout();

      return redirect('/company/login');
    }

    public function home()
    {
      
        if (Auth::guard('company')){
      return view('company.dashboard');
        }
            return redirect('/company/login');
        
    }
}
