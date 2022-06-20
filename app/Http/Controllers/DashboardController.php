<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Department;

class DashboardController extends Controller
{
    public static function index()
    {
        $counted_kendaraan = Kendaraan::with(['department', 'kategori'])->get()->count();
        $counted_department = Department::all()->count();
        return view('dashboard', compact('counted_kendaraan', 'counted_department'));
    }
}
