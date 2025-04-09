<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderByDesc('id')->paginate(10);

        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $request->validated();

        Contact::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email
        ]);

        return redirect()->route('contact.index')->with('success', 'Contato cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreContactRequest $request, Contact $contact)
    {
        $request->validated();

        $contact->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email
        ]);

        return redirect()->route('contact.show', ['contact' => $contact->id])->with('success', 'Contato alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contato excluido com sucesso!');
    }
}
