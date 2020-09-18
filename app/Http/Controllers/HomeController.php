<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Symfony\Component\Console\Input\Input;

class HomeController extends Controller{

    //Fungsi Login Page

    function loginPage() {
        return view('login');

    }


    function signin(){
        $variabelUsername       = request()->input("username");
        $variabelPassword       = request()->input("password");

        $isValid = Auth::attempt([
            'username' => $variabelUsername,
            'password' => $variabelPassword
        ]);

        if($isValid == true) {
            return redirect()->route('dashboard');
        }
        else {
            return back();
        }

    }


    function signout(){
        Auth::logout();//menghapus informasi bahwa akun tsb loogin
        return redirect()->route('login');
    }

    }
