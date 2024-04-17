<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutusController extends Controller {

//memasukan data ke database
    public function index(){
        $aboutUs = AboutUs::find(1);
        return view('about',[
            'about' => $aboutUs
        ]);
    }

}