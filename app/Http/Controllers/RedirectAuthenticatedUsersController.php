<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home(Request $request)
    {
        // condition who value already exist
        if (DB::table("activitas")->where("email", Auth::user()->email)->exists()) {
            DB::table("activitas")->where("email", Auth::user()->email)->update([
                "last_login" => now(),
                "updated_at" => now()
            ]);
        } else {
            DB::table("activitas")->insert([
                "email" => Auth::user()->email,
                "username" => Auth::user()->name,
                "role" => Auth::user()->role,
                "last_login" => now(),
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
        
        if (Auth::user()->role == 'admin') {
            return redirect()->route('home');
        } else {
            return redirect()->route('table');
        }





    }
}
