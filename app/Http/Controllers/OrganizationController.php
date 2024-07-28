<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;


class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::paginate(5);
        return view('organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric|min:10',
            'address' => 'nullable|string|max:255',
            'city' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'state' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
            'country' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
            'postalcode' => 'nullable|numeric',

        ], [
            'city.regex' => 'The city field must only contain letters and spaces.',
            'state.regex' => 'The state field must only contain letters and spaces.',
            'country.regex' => 'The country field must only contain letters and spaces.',
        ]);

        Organization::create($request->all());

        return redirect()->route('organizations.index')->with('success', 'Organization created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|numeric|min:10',
            'address' => 'nullable|string|max:255',
            'city' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'state' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
            'country' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
            'postalcode' => 'nullable|numeric',
        ], [
            'city.regex' => 'The city field must only contain letters and spaces.',
            'state.regex' => 'The state field must only contain letters and spaces.',
            'country.regex' => 'The country field must only contain letters and spaces.',
        ]);

        $organization->update($request->all());

        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');
    }
    }

