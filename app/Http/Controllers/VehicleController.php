<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

        // Render view
        return view('vehicle', compact('vehicles'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();

        // Render view
        return view('createvehicle', compact('vehicles'));
    }


    public function store(Request $request)
    {
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/vehicles', $image->hashName());

        // Create vehicle
        Vehicle::create([
            'Type' => $request->type,
            'Image' => $image->hashName(),
            'Model' => $request->model,
            'Year' => $request->year,
            'PassengerCount' => $request->passengercount,
            'Manufacturer' => $request->manufacturer,
            'Price' => $request->price,
            'FuelType' => $request->fueltype,
            'TrunkArea' => $request->trunkarea,
            'WheelCount' => $request->wheelcount,
            'CargoAreaSize' => $request->cargoareasize,
            'LuggageSize' => $request->luggagesize,
            'FuelCapacity' => $request->fuelcapacity
        ]);

        // Return redirect & show message
        return redirect()->route('vehicle.index')
            ->with('success', 'Vehicle created successfully');
    }

    public function edit($id)
    {
        // Get vehicle by id
        $vehicles = Vehicle::findOrFail($id);

        // Render view
        return view('editvehicle', compact('vehicles'));
    }

    public function update(Request $request, $id)
    {
        // Get vehicle by id
        $vehicles = Vehicle::findOrFail($id);

        // Check if has image
        if ($request->hasFile('image')) {

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/vehicles', $image->hashName());

            // Delete old image
            Storage::delete('public/vehicles/' . $vehicles->image);

            // Update vehicle with new image
            $vehicles->update([
                'Type' => $request->type,
                'Image' => $image->hashName(),
                'Model' => $request->model,
                'Year' => $request->year,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'Price' => $request->price,
                'FuelType' => $request->fueltype,
                'TrunkArea' => $request->trunkarea,
                'WheelCount' => $request->wheelcount,
                'CargoAreaSize' => $request->cargoareasize,
                'LuggageSize' => $request->luggagesize,
                'FuelCapacity' => $request->fuelcapacity
            ]);
        } else {
            // Update vehicle with no image
            $vehicles->update([
                'Type' => $request->type,
                'Model' => $request->model,
                'Year' => $request->year,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'Price' => $request->price,
                'FuelType' => $request->fueltype,
                'TrunkArea' => $request->trunkarea,
                'WheelCount' => $request->wheelcount,
                'CargoAreaSize' => $request->cargoareasize,
                'LuggageSize' => $request->luggagesize,
                'FuelCapacity' => $request->fuelcapacity
            ]);
        }

        // Return redirect & show message
        return redirect()->route('vehicle.index')
            ->with('success', 'Vehicle updated successfully');
    }

    public function destroy($id)
    {
        // Get vehicle by id
        $vehicles = Vehicle::findOrFail($id);

        // Delete image
        Storage::delete('public/vehicles/' . $vehicles->image);

        // Delete vehicle
        $vehicles->delete();

        // Return redirect & show message
        return redirect()->route('vehicle.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
