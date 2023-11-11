<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        // Render view
        return view('car', compact('cars'));
    }

    public function create()
    {
        $cars = Car::all();

        // Render view
        return view('createcar', compact('cars'));
    }

    public function store(Request $request)
    {
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/cars', $image->hashName());

        // Create car
        Car::create([
            'Image' => $image->hashName(),
            'Model' => $request->model,
            'Year' => $request->year,
            'Price' => $request->price,
            'PassengerCount' => $request->passengercount,
            'Manufacturer' => $request->manufacturer,
            'FuelType' => $request->fueltype,
            'LuggageSize' => $request->luggagesize
        ]);

        // Return redirect & show message
        return redirect()->route('car.index')
            ->with('success', 'Car created successfully');
    }

    public function edit($id)
    {
        // Get car by id
        $cars = Car::findOrFail($id);

        // Render view
        return view('editcar', compact('cars'));
    }

    public function update(Request $request, $id)
    {
        // Get car by id
        $cars = Car::findOrFail($id);
      
        // Check if has image
        if ($request->hasFile('image')) {

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/cars', $image->hashName());

            // Delete old image
            Storage::delete('public/cars/' . $cars->image);

            // Update car with new image
            $cars->update([
                'Image' => $image->hashName(),
                'Model' => $request->model,
                'Year' => $request->year,
                'Price' => $request->price,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'FuelType' => $request->fueltype,
                'LuggageSize' => $request->luggagesize
            ]);
        } else {
            // Update car with no image
            $cars->update([
                'Model' => $request->model,
                'Year' => $request->year,
                'Price' => $request->price,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'FuelType' => $request->fueltype,
                'LuggageSize' => $request->luggagesize,
            ]);
        }

        // Return redirect & show message
        return redirect()->route('car.index')
            ->with('success', 'Car updated successfully');
    }

    public function destroy($id)
    {
        // Get car by id
        $cars = Car::findOrFail($id);

        // Delete image
        Storage::delete('public/cars/' . $cars->image);

        // Delete car
        $cars->delete();

        // Return redirect & show message
        return redirect()->route('car.index')
            ->with('success', 'Car deleted successfully');
    }
}
