<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'tel' => 'required|min:9',
            'message' => 'required|min:5'
        ]);

        Message::create($validatedData);

        return redirect()->back()->with('success', "Message envoyé avec succès");
    }
}
