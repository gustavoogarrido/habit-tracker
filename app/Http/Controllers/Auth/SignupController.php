<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function index(){
        return view('signup');
    }

    public function signup(Request $request){

        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'password'=> 'required|min:6|confirmed',
        ]);

        $user = User::where('email',$data['email'])->first();

        if($user){
            return redirect()->back()->with('error','Usuario ja existe, tente novamente com outras informacoes');
        }

        $createdUser = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> $data['password'],
        ]);

        Auth::login($createdUser);

        $request->session()->regenerate();

        return redirect()->intended('/');

    }
}
