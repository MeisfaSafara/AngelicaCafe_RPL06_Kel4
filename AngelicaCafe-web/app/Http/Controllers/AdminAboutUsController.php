<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AdminAboutUsController extends Controller
{
    public function edit()
    {
        $aboutUs = AboutUs::first();
        return view('admin.aboutUs.edit', compact('aboutUs'));
    }
    
    public function update(Request $request)
    {
        $aboutUs = AboutUs::first();

        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $aboutUs->content = $validatedData['content'];
        $aboutUs->save();

        return redirect()->route('admin.aboutUs.edit')->with('success', 'About Us content updated successfully');
    }
}
