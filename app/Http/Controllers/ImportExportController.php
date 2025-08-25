<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function index()
    {
        return view('pages.import_export.index');
    }
}
