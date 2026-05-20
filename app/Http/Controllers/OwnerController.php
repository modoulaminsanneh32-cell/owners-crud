<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\user;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\App;

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
        $request->validate(
            [
                'name' => 'required|max:60',
                'surname' => 'required|max:60'
            ], [
                'name.required' => __('name is required'),
                'name.max' => __('name must not be longer than 60'),
                'surname.required' => __('surname is required'),
                'surname.max' => __('surname must not be longer than 60'),

            ]
        );

        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->user_id = $request->user()->id;
        $owner->save();

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

    public function destroy(Request $request, $id)
    {
        $owner = Owner::find($id);

        if ($request->user()->can('deleteOwner', $owner)) {
            $owner->delete();
        }


        return redirect()->route('owners.index');
    }
}
