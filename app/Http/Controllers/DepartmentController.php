<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $department = Department::all();
        return view('department.index', compact('department'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_department' => 'bail|required|unique:department|min:4|max:10',
            'nama_department' => 'required|min:4|max:255',
        ]);

        Department::create($validated);

        return redirect('department')->with('success', 'Berhasil menambahkan data');
    }


    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        //
    }

    public function destroy(Department $department)
    {
        Department::destroy($department->id);
        return redirect('department')->with('warning', 'Data berhasil dihapus');
    }
}
