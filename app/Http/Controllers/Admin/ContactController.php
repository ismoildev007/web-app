<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'address_uz' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'address_en' => 'nullable|string',
            'email' => 'nullable|email',
            'phone1' => 'nullable|string',
            'phone2' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'telegram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Kontakt muvaffaqiyatli qo\'shildi.');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address_uz' => 'nullable|string',
            'address_ru' => 'nullable|string',
            'address_en' => 'nullable|string',
            'email' => 'nullable|email',
            'phone1' => 'nullable|string',
            'phone2' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'telegram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Kontakt muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Kontakt muvaffaqiyatli o\'chirildi.');
    }
}

