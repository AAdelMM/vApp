<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CsvImportController extends Controller
{
    public function importCsv()
    {
    $csvFile = fopen(base_path('Documentations\driver_info.csv'), 'r');

    while (($data = fgetcsv($csvFile, 1000, ',')) !== FALSE) {
        DB::table('driver_info')->insert([
            'ptc_id' => $data[0],
            'name' => $data[1],
            'id_no' => $data[2],
        ]);
    }

    fclose($csvFile);

    // Redirect or return a response after the CSV data has been imported
    return redirect()->back()->with('success', 'CSV data imported successfully!');
    }
}
