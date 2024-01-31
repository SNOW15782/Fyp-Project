<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;

class PropertyViewController extends Controller
{
    public function index()
    {
        $properties = Property::where('property_status', 'approved')->get();

        $categories = Category::all();
        $properties->each(function ($property) {
            $property->averageRating = $property->ratings->avg('rating');
            $property->totalRatings = $property->ratings->count();
        });

        return view('userView.rooms', compact('properties', 'categories'));
    }

    public function show($id)
    {
        $property = Property::find($id);
        $property->totalRatings = $property->ratings->count();

        if (!$property) {
            abort(404);
        }

        return view('userView.room', ['property' => $property]);
    }

    // public function filter(Request $request)
    // {
    //     $q = Property::where('property_status', 'approved')->get();

    //     $name = $request->input('name');
    //     $location = $request->input('location');
    //     $price = $request->input('price');

    //     $q->where(function ($query) use ($name, $location, $price) {
    //         if ($name) {
    //             $query->orWhere('name', 'like', '%' . $name . '%');
    //         }

    //         if ($location) {
    //             $query->orWhere('location', 'like', '%' . $location . '%');
    //         }

    //         if ($price) {
    //             $query->orWhere('price', '<=', $price);
    //         }
    //     });

    //     $properties = $q->get();

    //     $properties->each(function ($property) {
    //         $property->averageRating = $property->ratings->avg('rating');
    //         $property->totalRatings = $property->ratings->count();
    //     });

    //     return view('userView.rooms', compact('properties'));
    // }
}
