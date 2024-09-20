<?php
// app/Http/Controllers/WashingPointsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\WashingPoint;

class WashingPointsController extends Controller
{
    public function index()
    {
        // Fetch data from the database
        $washingPoints = DB::table('tblwashingpoints')->get();
        
        // Pass the data to the view
        return view('location', ['washingPoints' => $washingPoints]);
    }


    public function create()
    {
        return view('admin.create_washing_point');
    }

    public function store(Request $request)
    {
        $request->validate([
            'washingPointName' => 'required|string|max:255',
            'washingPointAddress' => 'required|string',
            'contactNumber' => 'required|string|max:15',
        ]);

        $washingPoint = new WashingPoint();
        $washingPoint->washingPointName = $request->input('washingPointName');
        $washingPoint->washingPointAddress = $request->input('washingPointAddress');
        $washingPoint->contactNumber = $request->input('contactNumber');
        $washingPoint->save();

        return redirect()->route('admin.create_washing_point')
                         ->with('success', 'Car wash point added successfully');
    }
}

