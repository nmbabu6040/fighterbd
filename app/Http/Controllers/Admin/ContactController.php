<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);

        return view('admin.contact.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Message open করলে automatically Read হবে
        $contact->update([
            'status' => 1,
        ]);

        return view('admin.contact.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contact')
            ->with('success', 'Message deleted successfully.');
    }

    public function markUnread(Contact $contact)
    {
        $contact->update([
            'status' => 0,
        ]);

        return back()->with('success', 'Message marked as unread.');
    }
}
