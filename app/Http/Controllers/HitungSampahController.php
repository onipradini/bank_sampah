<?php

namespace App\Http\Controllers;

use App\Models\JenisSampahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungSampahController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model Siswa
        $jenissampah = JenisSampahModel::all();
        return view('hitungSampah', compact('jenissampah'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasilhitung = $request->jenis_sampah*$request->kg;

        $nama_jenis = DB::table('jenis_sampah')->where('jenis_sampah.id', '=', $request->jenis_sampah)->value('nama');

        $harga = DB::table('jenis_sampah')->where('jenis_sampah.id', '=', $request->jenis_sampah)->value('harga');

        $berat = $request->kg;

        $hasilhitung = $harga * $berat;

        return view('hasilHitung', compact('hasilhitung', 'nama_jenis', 'harga', 'berat'));
    }

}