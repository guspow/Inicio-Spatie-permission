<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    /*
    *
    * @brief
    * @author Gustavo Ramirez Yhauaca
    * @param string
    * @return
    *
    */
    public function index()
    {
        //return "hola";
        if(auth()->check()){
            return redirect()->route('home');
        }else{
            return view('auth.login');
        }   
    }

    /* 
    *
    * @brief
    * @author Gustavo Ramirez Yhauaca
    * @param string
    * @return
    *
    */


    public function customLogin(Request $request)
    {
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
        
            request()->session()->regenerate();
            return redirect()->route('home');
            
            // if(auth()->user()->activo==1){
            //     return redirect()->route('home');
            // }
            // else{
            //     return redirect("login")->with('error','Usuario inactivo');
            // }
        }

        return redirect("login")->with('error','Datos de acceso incorrectos');
    }


/*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function signOut(Request $request) {
        
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }


}
