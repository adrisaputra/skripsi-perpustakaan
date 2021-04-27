<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'status' => 1])) {
            // Jika berhasil login

		    return redirect('/dashboard');
            //return redirect()->intended('/details');
        }

		return redirect('/login')->with('status','User Tidak Aktif, Silahkan Hubungi Admin !');
    }
}
