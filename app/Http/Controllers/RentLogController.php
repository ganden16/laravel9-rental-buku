<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $rent_logs = RentLogs::all();
        
        return view('rentlog', compact('rent_logs'));
    }
}
