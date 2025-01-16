<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendContactMail(Request $request)
    {
        // Validation des saisies utilisateur
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ], [
            'name.required' => " Le  cchamps nom est vide",
            'name.max' => ">Le champs dois etre inférieur a 255 caractère"
        ]);
        
        Mail::raw($validated['message'], function ($mail) use ($validated) {
            $mail->to('maxime@hotmail.com') 
                 ->from($validated['email'], $validated['name'])
                 ->subject('Demande de contact');
        });
		Contact::create([
            'name'  => $validated['name'],
            'email'  => $validated['email'],
            'message'  => $validated['message'],
        ]);

        return back()->with('success', 'Votre demande de contact a été envoyé.');
    }
}