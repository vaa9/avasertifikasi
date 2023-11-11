<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Truck;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();

        // Render view
        return view('truck', compact('trucks'));
    }

    public function create()
    {
        $trucks = Truck::all();

        // Render view
        return view('createtruck', compact('trucks'));
    }

    public function store(Request $request)
    {
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/trucks', $image->hashName());

        // Create truck
        Truck::create([
            'Image' => $image->hashName(),
            'Model' => $request->model,
            'Year' => $request->year,
            'Price' => $request->price,
            'PassengerCount' => $request->passengercount,
            'Manufacturer' => $request->manufacturer,
            'WheelCount' => $request->wheelcount,
            'CargoAreaSize' => $request->cargoareasize
        ]);

        // Return redirect & show message
        return redirect()->route('truck.index')
            ->with('success', 'Truck created successfully');
    }

    public function edit($id)
    {
        // Get truck by id
        $trucks = Truck::findOrFail($id);

        // Render view
        return view('edittruck', compact('trucks'));
    }

    public function update(Request $request, $id)
    {
        // Get truck by id
        $trucks = Truck::findOrFail($id);

        // Check if has image
        if ($request->hasFile('image')) {

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/trucks', $image->hashName());

            // Delete old image
            Storage::delete('public/trucks/' . $trucks->image);

            // Update truck with new image
            $trucks->update([
                'Image' => $image->hashName(),
                'Model' => $request->model,
                'Year' => $request->year,
                'Price' => $request->price,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'WheelCount' => $request->wheelcount,
                'CargoAreaSize' => $request->cargoareasize
            ]);
        } else {
            // Update truck with no image
            $trucks->update([
                'Model' => $request->model,
                'Year' => $request->year,
                'Price' => $request->price,
                'PassengerCount' => $request->passengercount,
                'Manufacturer' => $request->manufacturer,
                'WheelCount' => $request->wheelcount,
                'CargoAreaSize' => $request->cargoareasize
            ]);
        }

        // Return redirect & show message
        return redirect()->route('truck.index')
            ->with('success', 'Truck updated successfully');
    }

    public function destroy($id)
    {
        // Get truck by id
        $trucks = Truck::findOrFail($id);

        // Delete image
        Storage::delete('public/trucks/' . $trucks->image);

        // Delete truck
        $trucks->delete();

        // Return redirect & show message
        return redirect()->route('truck.index')
            ->with('success', 'Truck deleted successfully');
    }
}
