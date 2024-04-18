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
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $aboutUs = AboutUs::first();
        $aboutUs->content = $validatedData['content'];
        $aboutUs->save();

        return redirect()->route('admin.aboutUs.edit')->with('success', 'About Us content updated successfully');
    }
}
