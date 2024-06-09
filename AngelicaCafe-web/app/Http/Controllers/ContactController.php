<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // $kontaks = Contact::all();
        // return view('contact', compact('kontaks'));
        return view('contact');

    }
    public function show()
    {
        // Fetch contacts and return view for displaying contacts
        $kontaks = Contact::all();
        return view('admin.contactforms', compact('kontaks'));
    }

    public function create()
    {
        return view('contact');
        //ganti return ke admin NEED
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'message' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);

        Contact::create($request->all());
        return redirect()->route('contact.index')->with('success', 'Your message has been successfully sent!');
        // return redirect()->back()->with('success', 'Your message has been successfully sent!');
    }
    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
