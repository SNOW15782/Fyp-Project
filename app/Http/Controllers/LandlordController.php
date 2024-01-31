<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class LandlordController extends Controller
{
    public function index()
    {
        // Get the current route name
        // Retrieve the data from the session based on the route name
        $currentRoute = Route::currentRouteName();
        session(['urlname' => $currentRoute]);

        // Retrieve properties associated with the currently logged-in landlord
        $property = Property::with('landlord')->where('landlord_id', auth()->id())->get();

        return view('landlordView.index', compact('property'));
    }

    public function create()
    {
        // Retrieve categories for property listing options
        $categories = Category::get(['name', 'id']);

        return view('landlordView.form', compact('categories'));
    }

    public function store(Request $request)
    {
        // Get the ID of the currently logged-in user
        $loggedInUserId = auth()->id();

        // Validate the submitted form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area_sqft' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'location' => 'required',
            'type' => 'required',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $imagePath = $request->image->storeAs('images', $imageName, 'public');
            $validatedData['image'] = '/storage/' . $imagePath;
        }

        $validatedData['landlord_id'] = $loggedInUserId;
        //$validatedData['category_id'] = $validatedData['type'];

        // Retrieve the selected category name from the form
        // Use the selected category name to associate the property with the category
        $selectedCategory = $request->input('type');
        $category = Category::where('name', $selectedCategory)->first();

        // Use $category->id to store the category ID in the property record
        if ($category) {

            $validatedData['category_id'] = $category->id;
        } else {
            abort(404);
        }

        Property::create($validatedData);

        // Redirect to the property listing index page
        return redirect()->route('landlordView.index');
    }

    public function edit(Property $property)
    {
        $categories = Category::get(['name', 'id']);

        return view('landlordView.edit', compact('property', 'categories'));
    }

    public function update(Request $request, Property $property)
    {
        // Validate the submitted form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area_sqft' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'location' => 'required',
            'type' => 'required',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($property->image) {
                $oldImagePath = public_path($property->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time().'.'.$request->image->extension();
            $imagePath = $request->image->storeAs('images', $imageName, 'public');
            $validatedData['image'] = '/storage/' . $imagePath;
        }

        $selectedCategory = $request->input('type');
        $category = Category::where('name', $selectedCategory)->first();

        // Use $category->id to store the category ID in the property record
        if ($category) {
            $validatedData['category_id'] = $category->id;
        } else {
            abort(404);
        }

        // Update the property record in the database
        $property->update($validatedData);

        // Redirect back to the property listing index page with a success message
        return redirect(route('landlordView.index'))->with('success', 'Room updated');
    }

    public function destroy(Property $property)
    {
        // Check if the room has an associated image
        if ($property->image) {
            // Extract the image path from the database
            $imagePath = public_path($property->image);

            // Check if the image file exists and then delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the property record from the database
        $property->delete();

        // Redirect back to the property listing index page with a success message
        return redirect()->route('landlordView.index')->with('success', 'Room deleted successfully.');
    }

    public function status()
    {
        // Get the current route name
        $currentRoute = Route::currentRouteName();
        // Retrieve the data from the session based on the route name
        session(['urlname' => $currentRoute]);

        // Retrieve properties associated with the currently logged-in landlord
        $property = Property::with('landlord')->where('landlord_id', auth()->id())->get();

        return view('landlordView.status', compact('property'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search === 'all') {
            $property = Property::all();

        } else {
            $property = Property::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%')
            ->get();

            $previousRoute = session('urlname');

            // Check if no records were found
            if ($property->isEmpty()) {
                return redirect()->route($previousRoute)->with('success', 'Not Found.');
            }

        }

        return view($previousRoute, compact('property', 'search'));
    }

}
