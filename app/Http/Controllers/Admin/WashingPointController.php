<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WashingPoint;

class WashingPointController extends Controller
{
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

