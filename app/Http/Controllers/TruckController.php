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
        return view('truck', compact('trucks'));
    }

    public function create()
    {
        $trucks = Truck::all();
        return view('createtruck', compact('trucks'));
    }

    public function store(Request $request)
    {
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/trucks', $image->hashName());

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

        return redirect()->route('truck.index')
            ->with('success', 'Truck created successfully');
    }

    public function edit($id)
    {
        $trucks = Truck::findOrFail($id);
        return view('edittruck', compact('trucks'));
    }

    public function update(Request $request, $id)
    {
        $trucks = Truck::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/trucks', $image->hashName());

            Storage::delete('public/trucks/' . $trucks->image);

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

        return redirect()->route('truck.index')
            ->with('success', 'Truck updated successfully');
    }

    public function destroy($id)
    {
        $trucks = Truck::findOrFail($id);

        Storage::delete('public/trucks/' . $trucks->image);

        $trucks->delete();

        return redirect()->route('truck.index')
            ->with('success', 'Truck deleted successfully');
    }
}
