<?php

namespace App\Http\Controllers;

use App\Mail\MyTestEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'fname' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Mail::to('akitopiano78@gmail.com')->send
        (new MyTestEmail(
            $validated['fname'],
            $validated['email'],
            $validated['message']));
        return back()->with('success', 'Bedankt voor je bericht!');
    }

}
