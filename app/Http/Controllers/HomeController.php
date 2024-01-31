<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//test auth
use App\Models\Property;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class HomeController extends Controller
{
    public function index()
    {
        return view('userView.homepage');
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
    }

}
