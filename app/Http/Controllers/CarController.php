<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Car::class);
    }
    public function index()
    {
        $cars = Car::with('owner')->latest()->get();
        return view('cars.index', compact('cars'));
    }

    // 🔹 Show create form
    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    // 🔹 Store new car
    public function store(CarRequest $request)
    {
        $car=Car::create($request->all());
        $car->user_id=$request->user()->id;
        $car->save();
        return redirect()->route('cars.index');
    }

    // 🔹 Show single car
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    // 🔹 Show edit form
    public function edit(Car $car)
    {
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    // 🔹 Update car
    public function update(CarRequest $request, Car $car)
    {
        $data = $request->validated();

        // Handle new image upload

        if ($car->photo!=null) {
            unlink(storage_path().'/app/public/'.$car->photo);
            $car->photo=null;
            $car->save();
        }
        return redirect()->route('cars.index');

    }

    // 🔹 Delete car
    public function destroy(Car $car)
    {
        // Delete image if exists
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully');
    }
    public function deletePhoto($id)
    {
        $car=Car::find($id);
        if ($car->photo!=null) {
            unlink(storage_path().'/app/public/'.$car->photo);
            $car->photo=null;
            $car->save();
        }
        return redirect()->back();

    }
}
