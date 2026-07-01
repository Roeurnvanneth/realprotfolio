<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contact_messages.index', compact('messages'));
    }

    public function show(ContactMessage $contact_message)
    {
        $contact_message->update(['is_read' => true]);

        return view('admin.contact_messages.show', ['message' => $contact_message]);
    }

    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();

        return back()->with('status', 'Message deleted.');
    }
}
