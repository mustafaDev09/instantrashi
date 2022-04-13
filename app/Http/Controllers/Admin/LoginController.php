<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    //admin login 

    public function login(LoginRequest $request)
    {
        $admin = Admin::where('username' ,$request->username)->where('password' ,$request->password)->first();
        // dd($admin);
        if($admin)
        {
             Auth::guard('admin')->login($admin);
              return redirect()->route('admin.dashboard');
            
        }
        else
        {
             $rules = [
                    'password' => 'required|min:6|exists:admins',
                ];
            $customMessages = [
                 'password.exists' => 'Invalid password.',
                ];
            $user = $this->validate($request, $rules, $customMessages);
        }

          session()->flash('error', 'Invalid Credentials!');
          return redirect()->back()->withInput($request->only('username', 'remember'));

    }

    //admin logout 

    public function logout()
    { 
       Auth::guard('admin')->logout();
        return redirect('/');
    }
}
