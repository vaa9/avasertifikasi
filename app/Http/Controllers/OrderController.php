<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order', compact('orders'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('createorder', compact('orders'));
    }

    public function store(Request $request)
    {
        Order::create([
            'CustomerID' => $request->customerid,
            'OrderDate' => $request->orderdate,
            'VehicleID' => $request->vehicleid,
            'Quantity' => $request->quantity,
            'TotalAmount' => $request->totalamount
        ]);

        return redirect()->route('order.index')
            ->with('success', 'Order created successfully');
    }

    public function edit($id)
    {
        $orders = Order::findOrFail($id);
        return view('editorder', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = Order::findOrFail($id);
        
        $orders->update([
            'CustomerID' => $request->customerid,
            'OrderDate' => $request->orderdate,
            'VehicleID' => $request->vehicleid,
            'Quantity' => $request->quantity,
            'TotalAmount' => $request->totalamount
        ]);

        return redirect()->route('order.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect()->route('order.index')
            ->with('success', 'Order deleted successfully');
    }
}
