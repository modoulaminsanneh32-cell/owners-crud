<?php

namespace App\Http\Controllers;

use App\Http\Middleware\KillSystem;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
     public function __construct(){

    }
    public function index()
    {
        // We use all() so we can loop through them in the index table
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        // We need all owners so you can pick one in the dropdown
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request)
    {
        // This will save reg_number, brand, model, and owner_id
        Car::create($request->all());
        return redirect()->route('cars.index');
    }

    public function edit(Car $car)
    {
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        return redirect()->route('cars.index');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
