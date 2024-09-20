<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WashingPoint;

class CarWashPointsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $washPoints = WashingPoint::all();
        return view('admin.manage_car_washpoints', compact('washPoints'));
    }

    public function destroy($id)
    {
        WashingPoint::findOrFail($id)->delete();
        return redirect()->route('admin.manage.car.washpoints')->with('success', 'Record Deleted');
    }

    public function edit($id)
    {
        // Implement the edit method as needed
        
        $washPoint = WashingPoint::findOrFail($id);
        return view('admin.edit_car_washpoint', compact('washPoint'));
    }
     

    public function update(Request $request, $id)
    {
        $request->validate([
            'washingpointname' => 'required|string|max:255',
            'address' => 'required|string',
            'contactno' => 'required|string|max:20'
        ]);

        $washPoint = WashingPoint::findOrFail($id);
        $washPoint->washingPointName = $request->input('washingpointname');
        $washPoint->washingPointAddress = $request->input('address');
        $washPoint->contactNumber = $request->input('contactno');
        $washPoint->save();

        return redirect()->route('admin.manage.car.washpoints')->with('success', 'Car wash point updated successfully');
    }
}


