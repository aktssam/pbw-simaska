<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kategori' => 'bail|required|unique:kategori|min:4|max:10',
            'nama_kategori' => 'required|min:4|max:255',
        ]);

        Kategori::create($validated);

        return redirect('kategori')->with('success', 'Berhasil menambahkan data');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'kode_kategori' => 'bail|required|min:4|max:10',
            'nama_kategori' => 'required|min:4|max:255',
        ]);

        Kategori::where('id', $kategori->id)->update($validated);
        return redirect('kategori')->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('kategori')->with('warning', 'Data berhasil dihapus');
    }
}
