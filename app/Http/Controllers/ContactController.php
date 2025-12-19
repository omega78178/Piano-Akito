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
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Mail::to('akitopiano78@gmail.com')->send
        (new MyTestEmail(
            $validated['name'],
            $validated['email'],
            $validated['message']));

        return redirect('/contact#contact')
            ->with('success', 'Your message has been sent.
You will receive a response as soon as possible.');


    }

}
