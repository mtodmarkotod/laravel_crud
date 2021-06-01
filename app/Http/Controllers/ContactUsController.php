<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactUsController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:25',
            'surname' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);
        
        Mail::to('mtod.markotod@gmail.com')->send(new ContactFormMail($data));

        return redirect()->back();
    }
}
