<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }

    public function authenticate(Request $request){
        // meu primeiro jeito:
        // $user = User::where("email", $request->email)->first();

        // if(!$user || !Hash::check($request->password, $user->password)){
        //     return redirect()->back()->with("error","Credenciais incorretas.");
        // }

        // return redirect('/');

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            return redirect()->intended('/');
        }

        return redirect()->back()->with("error","Credenciais incorretas.");
    }

    public function logout(){
        Auth::logout();
    }
}
