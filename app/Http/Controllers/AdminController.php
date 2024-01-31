<?php

namespace App\Http\Controllers;

use App\Models\Property;


class AdminController extends Controller
{
    public function index()
    {
        //$property = Property::whereIn('property_status', ['pending', 'rejected'])->get();
        $property = Property::whereIn('property_status', ['pending'])->get();

        return view('adminView.index', compact('property'));
    }

    public function approve(Property $property)
    {
        // Update the property's status to 'approved'
        $property->update(['property_status' => 'approved']);

        return redirect()->route('adminView.index')->with('success', 'Property approved successfully.');
    }

    public function reject(Property $property)
    {
        // Update the property's status to 'rejected'
        $property->update(['property_status' => 'rejected']);

        return redirect()->route('adminView.index')->with('success', 'Property rejected successfully.');
    }
}
