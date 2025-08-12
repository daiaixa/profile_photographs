<?php

namespace App\Http\Controllers;

use App\Models\ContactMessege;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class ContactMessegeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Guardar en la base de datos
        ContactMessege::create([
            'fullname' => $validated['fullname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'is_read' => false, // Por defecto no leído
        ]);

               
        return back()->with('success', '¡ Mensaje enviado ! Nos comunicarsemos muy pronto.' );
    }
}
