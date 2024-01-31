<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Property;

class RatingController extends Controller
{
    public function create($property_id)
    {
        $property = Property::findOrFail($property_id);

        return view('ratings.create', compact('property'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'property_id' => 'required|exists:properties,id',
        ]);

        $rating = new Rating();
        $rating->rating = $request->rating;
        $rating->user_id = auth()->id();
        $rating->property_id = $request->property_id;
        $rating->save();

        return redirect()->route('userView.show', $request->property_id)->with('success', 'Rating submitted successfully!');
    }

}
