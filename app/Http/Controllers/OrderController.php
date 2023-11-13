<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

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
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        // Render view
        return view('createorder', compact(['orders', 'customers', 'vehicles']));
    }

    public function store(Request $request)
    {
        // Create order
        Order::create([
            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id
        ]);

        // Return redirect & show message
        return redirect()->route('order.index')
            ->with('success', 'Order created successfully');
    }

    public function edit($id)
    {
        // Get order by id
        $orders = Order::findOrFail($id);

        $customers = Customer::all();
        $vehicles = Vehicle::all();

        // Render view
        return view('editorder', compact(['orders', 'customers', 'vehicles']));
    }

    public function update(Request $request, $id)
    {
        // Get order by id
        $orders = Order::findOrFail($id);

        // Update order
        $orders->update([
            'customer_id' => $request->customer_id,
            'vehicle_id' => $request->vehicle_id
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
