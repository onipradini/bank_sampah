<?php

namespace App\Http\Controllers;

use App\Models\JenisSampahModel;
use Illuminate\Http\Request;
use File;

class JenisSampahController extends Controller
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
        //menampilkan semua data dari model Siswa
        $jenissampah = JenisSampahModel::all();
        return view('admin.jenis_sampah.index', compact('jenissampah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.jenis_sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'harga' => 'required',

        ]);

        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('images'), $imageName);

        $jenissampah = new JenisSampahModel();
        $jenissampah->nama = $request->nama;
        $jenissampah->deskripsi = $request->deskripsi;
        $jenissampah->foto = $imageName;
        $jenissampah->harga = $request->harga;
        $jenissampah->save();

        return redirect()->route('jenissampah.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenissampah = JenisSampahModel::findOrFail($id);
        return view('admin.jenis_sampah.edit', compact('jenissampah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => '',
            'harga' => 'required',
        ]);

        if ($request->foto == null) {
            $jenissampah = JenisSampahModel::findOrFail($id);
            $jenissampah->nama = $request->nama;
            $jenissampah->deskripsi = $request->deskripsi;
            $jenissampah->harga = $request->harga;
            $jenissampah->save();
        } else {
            $imageName = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('images'), $imageName);

            $jenissampah = JenisSampahModel::findOrFail($id);
            $jenissampah->nama = $request->nama;
            $jenissampah->deskripsi = $request->deskripsi;
            $jenissampah->foto = $imageName;
            $jenissampah->harga = $request->harga;
            $jenissampah->save();
        }



        return redirect()->route('jenissampah.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenissampah = JenisSampahModel::findOrFail($id);
        $jenissampah->delete();
        return redirect()->route('jenissampah.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
