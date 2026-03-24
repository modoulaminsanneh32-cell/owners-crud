<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\user;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        // Using all() ensures 'name' and 'surname' are caught from your form
        Owner::create($request->all());
        return redirect()->route('owners.index');
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $owner->update($request->all());
        return redirect()->route('owners.index');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
