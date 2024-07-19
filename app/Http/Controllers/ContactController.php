<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Organization;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::with('organization')->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::all();
        return view('contacts.create', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'organization_id' => 'required|exists:organizations,id',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
        ]);

        
        // dd($data);

        $contact = Contact::create($request->all());

        return redirect()->route('contacts.create')->with('success', 'Contact created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $contact = Contact::findOrFail($id);
        $organizations = Organization::all();
        return view('contacts.edit', compact('contact', 'organizations'));

        // $organization = Organization::with('contacts')->findOrFail($id);
        // return view('organizations.edit', compact('organization'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'organization_id' => 'required|exists:organizations,id',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.create')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $organization = Organization::findOrFail($id);
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}
