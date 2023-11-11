<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        // Render view
        return view('order', compact('orders'));
    }

    public function create()
    {
        $orders = Order::all();

        // Render view
        return view('createorder', compact('orders'));
    }

    public function store(Request $request)
    {
        // Create order
        Order::create([
            'CustomerID' => $request->customerid,
            'OrderDate' => $request->orderdate,
            'VehicleID' => $request->vehicleid,
            'Quantity' => $request->quantity,
            'TotalAmount' => $request->totalamount
        ]);

        // Return redirect & show message
        return redirect()->route('order.index')
            ->with('success', 'Order created successfully');
    }

    public function edit($id)
    {
        // Get order by id
        $orders = Order::findOrFail($id);

        // Render view
        return view('editorder', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        // Get order by id
        $orders = Order::findOrFail($id);

        // Update order
        $orders->update([
            'CustomerID' => $request->customerid,
            'OrderDate' => $request->orderdate,
            'VehicleID' => $request->vehicleid,
            'Quantity' => $request->quantity,
            'TotalAmount' => $request->totalamount
        ]);

        // Return redirect & show message
        return redirect()->route('order.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        // Get order by id 
        $orders = Order::findOrFail($id);

        // Delete order
        $orders->delete();

        // Return redirect & show message
        return redirect()->route('order.index')
            ->with('success', 'Order deleted successfully');
    }
}
