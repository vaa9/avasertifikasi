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
         // Upload image
         $image = $request->file('image');
         $image->storeAs('public/motorcycles', $image->hashName());

        Motorcycle::create([
            'Image' => $image->hashName(),
            'Model' => $request->model,
            'Year' => $request->year,
            'Price' => $request->price,
            'PassengerCount' => $request->passengercount,
            'Manufacturer' => $request->manufacturer,
            'FuelCapacity' => $request->fuelcapacity,
            'LuggageSize' => $request->luggagesize
        ]);

        return redirect()->route('motorcycle.index')
            ->with('success', 'Motorcycle created successfully');
    }

    public function edit($id)
    {
        $motorcycles = Motorcycle::findOrFail($id);
        return view('editmotorcycle', compact('motorcycles'));
    }

    public function update(Request $request, $id)
    {
        $motorcycles = Motorcycle::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/motorcycles', $image->hashName());

            Storage::delete('public/motorcycles/' . $motorcycles->image);
       
            $motorcycles->update([
                'Image' => $image->hashName(),
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

        Storage::delete('public/motorcycles/' . $motorcycles->image);

        $motorcycles->delete();

        return redirect()->route('motorcycle.index')
            ->with('success', 'Motorcycle deleted successfully');
    }
}
