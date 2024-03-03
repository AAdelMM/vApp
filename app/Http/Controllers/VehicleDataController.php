<?php

namespace App\Http\Controllers;
use App\Models\Vehicle_Data; // Assuming you have a VEntry model
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



//use Illuminate\view\View;

class VehicleDataController extends Controller
{
    public function index()
    {
        return view('vehicle_data.index');
    }
    
    /**
     * Display a listing of the resource.
     *
     *
     */
/*   public function index(): View
    {
        $vehicls = VehicleData::all();
       // return view('violation_entry.index', compact('entries'));
      // return response()->view('violation_entry.index', compact('entries'));
     // return view('violation_entry.index', compact('entries'))->render();
     return view("vehicle_data.index")->with('vehicls', $vehicls);
    }
*/
}
