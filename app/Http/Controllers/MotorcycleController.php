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

        // Render view
        return view('motorcycle', compact('motorcycles'));
    }

    public function create()
    {
        $motorcycles = Motorcycle::all();

        // Render view
        return view('createmotorcycle', compact('motorcycles'));
    }

    public function store(Request $request)
    {
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/motorcycles', $image->hashName());

        // Create motorcycle
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

        // Return redirect & show message
        return redirect()->route('motorcycle.index')
            ->with('success', 'Motorcycle created successfully');
    }

    public function edit($id)
    {
        // Get motorcycle by id
        $motorcycles = Motorcycle::findOrFail($id);

        // Render view
        return view('editmotorcycle', compact('motorcycles'));
    }

    public function update(Request $request, $id)
    {
        // Get motorcycle by id
        $motorcycles = Motorcycle::findOrFail($id);

        // Check if has image
        if ($request->hasFile('image')) {

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/motorcycles', $image->hashName());

             // Delete old image
            Storage::delete('public/motorcycles/' . $motorcycles->image);

            // Update motorcycle with new image
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
            // Update motorcycle with no image
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

        // Return redirect & show images
        return redirect()->route('motorcycle.index')
            ->with('success', 'Motorcycle updated successfully');
    }

    public function destroy($id)
    {
        // Get motorcycle by id
        $motorcycles = Motorcycle::findOrFail($id);

        // Delete image
        Storage::delete('public/motorcycles/' . $motorcycles->image);

        // Delete motorcycle
        $motorcycles->delete();

        // Return redirect & show message
        return redirect()->route('motorcycle.index')
            ->with('success', 'Motorcycle deleted successfully');
    }
}
