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
        Car::create([
            'Image' => $request->image,
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
        $img = $request->file('image');
        if ($img) {
            Storage::delete($request->oldImage);
            $cars->update([
                'Image' => $img->store('image'),
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
        $cars->delete();

        return redirect()->route('car.index')
            ->with('success', 'Car deleted successfully');
    }
}
