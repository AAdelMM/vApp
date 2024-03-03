<?php

namespace App\Http\Controllers;
use App\Models\DriverInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DriverInfoController extends Controller
{
     
    public function index()
    {
        $driverInfos = DriverInfo::all();
        return view('driver_info.index', compact('driverInfos'));
    }

    public function create()
    {
        return view('driver_info.create');
    }

   
    public function destroy(string $id): RedirectResponse
    {
        DriverInfo::destroy($id);
        return redirect('driver_info')->with('flash_message','Record Deleted!');
    }



}
