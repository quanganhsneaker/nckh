<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Tin nhắn đã được gửi!');
    }

    public function index() {
        $contacts = Contact::latest()->get();
        return view('messages', compact('contacts'));
    }
}