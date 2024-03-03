<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VEntryController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\DriverInfoController;
use App\Http\Controllers\VehicleDataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/violation_info', [VEntryController::class, 'violationInfo'])->name('violation.info');
Route::get('/driver_info', [DriverInfoController::class, 'index'])->name('driver_info.index');
Route::get('/drivers/create', [DriverInfoController::class, 'create'])->name('driver_info.create');
Route::delete('/drivers/{id}', [DriverInfoController::class, 'destroy'])->name('driver_info.destroy');
//vehicle data
Route::get('/vehicle_data', [VehicleDataController::class, 'index'])->name('vehicle_data.index');




//entry form
/*
Route::get('/violation-types', function () {
    $violationTypes = ViolationType::all();
    return response()->json($violationTypes);
});
/////*/
Route::resource('/violation_entry',VEntryController::class);

Route::get('/violation_entry', [VEntryController::class, 'index']);
Route::patch('violation_entry/{id}', 'VEntryController@update')->name('violation_entry.update');





//import csvfile
Route::get('/import', [CsvImportController::class, 'importCsv'])->name('import');
//drop-down menu
//Route::get('plate-options', 'ViolationEntryController@plateOptions')->name('plate_options');
//Route::get('plate-options',  'VEntryController@plateOptions')->name('plate_options');

//Route::get('/v_entries/{v_entry}/edit', [VEntryController::class, 'edit'])->name('v_entries.edit');
//Route::delete('/v_entries/{v_entry}', [VEntryController::class, 'destroy'])->name('v_entries.destroy');
