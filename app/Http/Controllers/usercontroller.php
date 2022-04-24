<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    function login(Request $req){
        $user = DB::table('users')->where('username',$req->username)->first();
        if (!$user || !Hash::check($req->password,$user->password)) {
            return 'Invalid Credentials';
        }else{
            $req->session()->put('user',$user);
            return redirect('/dashboard');
        }
    }
}
