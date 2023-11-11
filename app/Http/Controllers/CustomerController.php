<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer', compact('customers'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('createcustomer', compact('customers'));
    }

    public function store(Request $request)
    {
        Customer::create([
            'Name' => $request->name,
            'Address' => $request->address,
            'PhoneNumber' => $request->phonenumber,
            'IDCard' => $request->idcard
        ]);

        return redirect()->route('customer.index')
            ->with('success', 'Customer created successfully');
    }

    public function edit($id)
    {
        $customers = Customer::findOrFail($id);
        return view('editcustomer', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
       
        $customers->update([
            'Name' => $request->name,
            'Address' => $request->address,
            'PhoneNumber' => $request->phonenumber,
            'IDCard' => $request->idcard
        ]);

        return redirect()->route('customer.index')
            ->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        
        $customers->delete();

        return redirect()->route('customer.index')
            ->with('success', 'Customer deleted successfully');
    }
}

