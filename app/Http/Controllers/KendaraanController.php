<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Department;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class KendaraanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = Kendaraan::with(['kategori', 'department'])->get();
        return view('kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        $kategori = Kategori::all();
        return view('kendaraan.create', compact('department', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nopol' => 'required|min:3|max:10',
            'merk' => 'required|min:2|max:255',
            'tipe' => 'required|min:2|max:255',
            'tahun_keluaran' => 'required|min:4|max:4',
            'kategori_id' => 'required',
            'department_id' => 'required',
            'blob_gambar' => 'image|file|max:1024'
        ]);

        if ($request->file('blob_gambar')) {
            $file = $request->file('blob_gambar')->getRealPath();
            $image = file_get_contents($file);
            $base64 = base64_encode($image);
            $validated['blob_gambar'] = $base64;
        }

        if ($request->no_bpkb) {
            $validated['no_bpkb'] = $request->no_bpkb;
            $validated['bpkb'] = true;
        }

        if ($request->no_stnk) {
            $validated['no_stnk'] = $request->no_stnk;
            $validated['stnk'] = true;
        }

        Kendaraan::create($validated);
        return redirect('kendaraan')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        $kendaraan = Kendaraan::with(['department', 'kategori'])->findOrFail($kendaraan->id);

        $image = $kendaraan->blob_gambar; // image base64 encoded
        preg_match("/data:image\/(.*?);/", $image); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/', '', $image); // remove the type part
        $image = str_replace(' ', '+', $image);
        $imageName = 'image_preview.png';
        // dd($imageName);
        Storage::disk('public')->put($imageName, base64_decode($image));

        return view('kendaraan.show', compact('kendaraan', 'imageName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        $department = Department::all();
        $kategori = Kategori::all();

        $image = $kendaraan->blob_gambar; // image base64 encoded
        preg_match("/data:image\/(.*?);/", $image); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/', '', $image); // remove the type part
        $image = str_replace(' ', '+', $image);
        $imageName = 'image_preview.png';

        // dd($imageName);
        Storage::disk('public')->put($imageName, base64_decode($image));

        return view('kendaraan.edit', compact('kendaraan', 'kategori', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        // dd($request->no_stnk);
        $validated = $request->validate([
            'nopol' => 'required|min:3|max:10',
            'merk' => 'required|min:2|max:255',
            'tipe' => 'required|min:2|max:255',
            'tahun_keluaran' => 'required|min:4|max:4',
            'kategori_id' => 'required',
            'department_id' => 'required',
            'blob_gambar' => 'image|file|max:1024'
        ]);


        if ($request->file('blob_gambar')) {
            $file = $request->file('blob_gambar')->getRealPath();
            $image = file_get_contents($file);
            $base64 = base64_encode($image);
            $validated['blob_gambar'] = $base64;
        } else {
            $validated['blob_gambar'] = $kendaraan->blob_gambar;
        }

        if ($request->no_bpkb) {
            $validated['no_bpkb'] = $request->no_bpkb;
            $validated['bpkb'] = true;
        }

        if ($request->no_stnk) {
            $validated['no_stnk'] = $request->no_stnk;
            $validated['stnk'] = true;
        }

        Kendaraan::where('id', $kendaraan->id)->update($validated);
        return redirect('kendaraan')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        Kendaraan::destroy($kendaraan->id);
        return redirect('kendaraan')->with('warning', 'Data berhasil dihapus');
    }
}
