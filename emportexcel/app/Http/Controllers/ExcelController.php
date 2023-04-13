<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\YourImportClass;

class ExcelController extends Controller
{
    public function import(Request $request)
{
    $validatedData = $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);

    $import = new YourImportClass();
    Excel::import($import, request()->file('file'));

    return redirect()->back()->with('success', 'File imported successfully!');
}
}
