<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreownerRequest;
use App\Http\Requests\UpdateownerRequest;
use App\Models\owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = owner::all();
        return view('owners.index')->with('owners',$owners);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreownerRequest $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'surname' => 'required|max:255',
        ]);

        Owner::create($validated);
        return redirect()->route('owners.index')->with('success','Owner added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(owner $owner)
    {
        return view('owners.show')->with('owner',$owner);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(owner $owner)
    {
        return view('owners.edit')->with('owner',$owner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateownerRequest $request, owner $owner)
{
    $owner->update($request->validated());

    return redirect()->route('owners.index')->with('success', 'Owner updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(owner $owner)
    {
        $owner->delete();
        return back()->with('success','Owner deleted successfully.');
    }
}
