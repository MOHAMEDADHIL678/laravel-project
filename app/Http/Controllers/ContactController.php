<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $contacts = Contact::with('organization')->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
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
            'firstname' => 'required|alpha:ascii|max:255',
            'lastname' => 'required|alpha:ascii|max:255',
            'organization_id' => 'required|exists:organizations,id',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'state' => 'nullable|regex:/^[\pL\s]+$/ui|max:255',
        ], [
            'city.regex' => 'The city field must only contain letters and spaces.',
            'state.regex' => 'The state field must only contain letters and spaces.',
        ]);

        $user = Auth::user();

        
        // dd($data);

        $contact = Contact::create($request->all());
        $organization = Organization::findOrFail($request->input('organization_id'));

        return redirect()->route('organizations.edit', $organization->id)->with('success', 'Contact created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
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
            'firstname' => 'required|alpha:ascii|max:255',
            'lastname' => 'required|alpha:ascii|max:255',
            'organization_id' => 'required|exists:organizations,id',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
            'state' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
        ], [
            'city.regex' => 'The city field must only contain letters and spaces.',
            'state.regex' => 'The state field must only contain letters and spaces.',
        ]);

        $user = Auth::user();
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('organizations.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        // $organization = Organization::findOrFail($id);
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}
