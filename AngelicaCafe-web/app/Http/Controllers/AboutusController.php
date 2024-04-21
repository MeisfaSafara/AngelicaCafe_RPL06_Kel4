<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutusController extends Controller {

    public function index(){
        $aboutUs = AboutUs::find(1);
        return view('about',[
            'about' => $aboutUs
        ]);
    }  
}