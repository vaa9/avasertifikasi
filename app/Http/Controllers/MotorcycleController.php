<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Motorcycle;

class MotorcycleController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycle::all();
        return view('motorcycle', compact('motorcycles'));
    }

    public function create()
    {
        $motorcycles = Motorcycle::all();
        return view('createmotorcycle', compact('motorcycles'));
    }

    public function store(Request $request)
    {
        Motorcycle::create([
            'Image' => $request->image,
            'Model' => $request->model,
            'Year' => $request->year,
            'Price' => $request->price,
            'PassengerCount' => $request->passengercount,
            'Manufacturer' => $request->manufacturer,
            'FuelCapacity' => $request->fuelcapacity,
            'LuggageSize' => $request->luggagesize
        ]);

        return redirect()->route('car.index')
            ->with('success', 'Car created successfully');
    }

    public function edit($id)
    {
        $motorcycles = Motorcycle::findOrFail($id);
        return view('editmotorcycle', compact('motorcycles'));
    }

    public function update(Request $request, $id)
    {
        $motorcycles = Motorcycle::findOrFail($id);
        $img = $request->file('image');
        if ($img) {
            Storage::delete($request->oldImage);
            $motorcycles->update([
                'Image' => $img->store('image'),
                'Model' => $request->model,
                'Year' => $request->year,
                'Price' => $request->price,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'FuelCapacity' => $request->fuelcapacity,
                'LuggageSize' => $request->luggagesize
            ]);
        } else {
            $motorcycles->update([
                'Model' => $request->model,
                'Year' => $request->year,
                'Price' => $request->price,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'FuelCapacity' => $request->fuelcapacity,
                'LuggageSize' => $request->luggagesize,
            ]);
        }

        return redirect()->route('motorcycle.index')
            ->with('success', 'Motorcycle updated successfully');
    }

    public function destroy($id)
    {
        $motorcycles = Motorcycle::findOrFail($id);
        $motorcycles->delete();

        return redirect()->route('motorcycle.index')
            ->with('success', 'Motorcycle deleted successfully');
    }
}
