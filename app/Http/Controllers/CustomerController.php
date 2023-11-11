<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        // Render view 
        return view('customer', compact('customers'));
    }

    public function create()
    {
        $customers = Customer::all();

        // Render view
        return view('createcustomer', compact('customers'));
    }

    public function store(Request $request)
    {
        // Create customer
        Customer::create([
            'Name' => $request->name,
            'Address' => $request->address,
            'PhoneNumber' => $request->phonenumber,
            'IDCard' => $request->idcard
        ]);

        // Return redirect & show message
        return redirect()->route('customer.index')
            ->with('success', 'Customer created successfully');
    }

    public function edit($id)
    {
        // Get customer by id
        $customers = Customer::findOrFail($id);

        // Render view
        return view('editcustomer', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        // Get customer by id
        $customers = Customer::findOrFail($id);
       
        // Update customer
        $customers->update([
            'Name' => $request->name,
            'Address' => $request->address,
            'PhoneNumber' => $request->phonenumber,
            'IDCard' => $request->idcard
        ]);

        // Return redirect & show message
        return redirect()->route('customer.index')
            ->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        // Get customer by id
        $customers = Customer::findOrFail($id);

        // Delete customer
        $customers->delete();

        // Return redirect & show message
        return redirect()->route('customer.index')
            ->with('success', 'Customer deleted successfully');
    }
}

