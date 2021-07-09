<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function homepage() {
        return view('home');
    }

    public function showProfile() {
        return view('profile.details');
    }
    public function editProfile(){
        return view('profile.edit-details');
    }
    
}
