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
        return view('car', compact('cars'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('createcar', compact('cars'));
    }

    public function store(Request $request)
    {
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/cars', $image->hashName());

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

        return redirect()->route('car.index')
            ->with('success', 'Car created successfully');
    }

    public function edit($id)
    {
        $cars = Car::findOrFail($id);
        return view('editcar', compact('cars'));
    }

    public function update(Request $request, $id)
    {
        $cars = Car::findOrFail($id);
      
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/cars', $image->hashName());

            Storage::delete('public/cars/' . $cars->image);

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

        return redirect()->route('car.index')
            ->with('success', 'Car updated successfully');
    }

    public function destroy($id)
    {
        $cars = Car::findOrFail($id);

        Storage::delete('public/cars/' . $cars->image);

        $cars->delete();

        return redirect()->route('car.index')
            ->with('success', 'Car deleted successfully');
    }
}
