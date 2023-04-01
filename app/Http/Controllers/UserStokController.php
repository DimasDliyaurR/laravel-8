<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserStokController extends Controller
{
    public function index(){
        return view('user.tabel');
    }
}
