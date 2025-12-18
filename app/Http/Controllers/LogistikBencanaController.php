<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogistikBencana;
use App\Models\KejadianBencana;

class LogistikBencanaController extends Controller
{
    // 🔹 tampilkan data logistik
    public function index()
    {
        // ambil semua logistik beserta relasi kejadian
        $logistik = LogistikBencana::with('kejadian')->get();

        // ambil semua kejadian (untuk dropdown atau tampilan lain di view)
        $kejadian = KejadianBencana::all();

        // kirim kedua variabel ke view
        return view('pages.logistik.index', compact('logistik', 'kejadian'));
    }

    // 🔹 form tambah logistik
    public function create()
    {
        $kejadian = KejadianBencana::all();

        return view('pages.logistik.create', compact('kejadian'));
    }

    // 🔹 simpan logistik
    public function store(Request $request)
    {
        $request->validate([
            'kejadian_id'  => 'required|exists:kejadian_bencana,id',
            'nama_barang'  => 'required|string|max:255',
            'satuan'       => 'required|string|max:50',
            'stok'         => 'required|numeric|min:0',
            'sumber'       => 'required|string|max:255',
        ]);

        LogistikBencana::create([
            'kejadian_id' => $request->kejadian_id,
            'nama_barang' => $request->nama_barang,
            'satuan'      => $request->satuan,
            'stok'        => $request->stok,
            'sumber'      => $request->sumber,
        ]);

        return redirect()
            ->route('logistik.index')
            ->with('success', 'Logistik berhasil ditambahkan');
    }
}
