<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\Data;
use App\Services\TotalDataService;
use Excel;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //

    public function getData() {
        return (new TotalDataService())->toCollection();
    }

    public function uploadExcel() {
        Excel::import(new DataImport(), request()->file('file'));
        return response()->json(['data' => 'ok']);
    }
}
