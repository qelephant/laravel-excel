<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\File;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        $data = File::paginate(50);
        return view('upload', compact('data'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        Excel::import(new ExcelImport, $request->file('file'));
        return redirect()->back()->with('success', 'Successfully imported');
    }

    public function show($id)
    {
        $data = File::findOrFail($id);
        return view('show', compact('data'));
    }
}
