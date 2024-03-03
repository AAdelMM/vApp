<?php

namespace App\Http\Controllers;
use App\Models\VEntry; // Assuming you have a VEntry model
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;



//use Illuminate\view\View;

class VEntryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     *
     */
   public function index(): View
    {
        $v = VEntry::all();
       return view("violation_entry.index", compact('v'));
    // return view("violation_entry.index")->with('v', $v);
    }

    // ... other methods for CRUD operations (optional)
    public function create(): View
    {
        $options = DB::table('vehicle_users_ptc')->select('id', 'Plate')->get();
        $vts = DB::table('violation_list')->select('id', 'VdesEn as VDesEn')->get();

       return view('violation_entry.create', ['options' => $options, 'vts' => $vts]);
    }

    public function store(Request $request): RedirectResponse
    {
      /*  
        $input = $request->all();
        VEntry::create($input);
       */ 
        $validatedData = $request->validate([
            'vno' => 'required|string|max:255',
            'vdate' => 'required|date',
            'vtime' => 'required',
            'plate' => 'required|string',
           // 'fleet' => 'nullable|string',
          //  'user' => 'required|string',
            'v_des_en' => 'required|string', // Ensure this validation rule matches your expectations
        ]);
         // Fetch Fleet and User based on Plate ID
        //$plateDetails = DB::table('vehicle_users_ptc')->where('id', $request->plate)->first(['Fleet as fleet', 'Vehicle User as user']);
        $plateDetails = DB::table('vehicle_users_ptc')->where('Plate', $request->plate)->first();

        if (!$plateDetails) {
            return back()->withErrors(['msg' => 'Plate details not found.']);
        }

        $validatedData['fleet'] = $plateDetails->Fleet; // Make sure 'Fleet' matches the column name in your database
        $validatedData['user'] = $plateDetails->{'Vehicle User'}; // Adjust if the column name is different
    
        // Include Fleet and User in the data to be stored
       // $validatedData['fleet'] = $plateDetails->Fleet;
       // $validatedData['user'] = $plateDetails->vehicleUser;

        VEntry::create($validatedData);
        
        return redirect('violation_entry')->with('flash_message','Violation Added');
    }

    public function edit(string $id): View
    {
        $v = VEntry::find($id);
        return view('violation_entry.edit')->with('v', $v);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $v = VEntry::find($id);
        $input = $request->all(0);
        $v->update($input);
        return redirect('violation_entry')->with('flash_message','Record Updated');
    }

    public function destroy(string $id): RedirectResponse
    {
        VEntry::destroy($id);
        return redirect('violation_entry')->with('flash_message','Record Deleted!');
    }
    //drop-down menu
    public function plateOptions(Request $request)
    {
        $options = DB::table('vehicle_users_ptc')->select('id', 'plate_number')->get();
        return view('violation_entry.create')->with('options', $options);
    }

    public function violationInfo(): View
    {
        // Fetch all records from VEntry model (or apply any filtering you need)
       // $entries = VEntry::all();

        // Pass the data to the violation_info view
      //  return view('violation_info.index', compact('entries'));

      $entries = DB::table('v_entry')
      ->joinSub(
          DB::table('violation_list')
            ->select('VdesEn', DB::raw('MAX(Amount) as amount'))
            ->groupBy('VdesEn'),
          'violation_list',
          'v_entry.v_des_en',
          '=',
          'violation_list.VdesEn'
      )
      ->select('v_entry.*', 'violation_list.amount')
      ->get();

      return view('violation_info.index', compact('entries'));
    }




}
