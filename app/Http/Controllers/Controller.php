<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Kendaraan;
use App\Models\Department;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function dahsboard()
    {
        $counted_kendaraan = Kendaraan::all()->count();
        return view('dashboard', compact('counted_kendaraan'));
    }
}
