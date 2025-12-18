<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DistribusiLogistik;
use App\Models\LogistikBencana;
use App\Models\PoskoBencana;

class DistribusiLogistikController extends Controller
{
    // 1️⃣ tampil data
    public function index()
    {
        $distribusi = DistribusiLogistik::with(['logistik', 'posko'])->get();
        return view('pages.distribusi.index', compact('distribusi'));
    }

    // 2️⃣ form tambah
    public function create()
    {
        $logistik = LogistikBencana::all();
        $posko = PoskoBencana::all();

        return view('pages.distribusi.create', compact('logistik', 'posko'));
    }

    // 3️⃣ simpan + kurangi stok
    public function store(Request $request)
    {
        $request->validate([
            'logistik_id' => 'required',
            'posko_id' => 'required',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
            'penerima' => 'required',
        ]);

        DB::transaction(function () use ($request) {

            $logistik = LogistikBencana::findOrFail($request->logistik_id);

            if ($request->jumlah > $logistik->stok) {
                throw new \Exception('Stok tidak mencukupi');
            }

            DistribusiLogistik::create($request->all());

            $logistik->decrement('stok', $request->jumlah);
        });

        return redirect()->route('distribusi-logistik.index')
            ->with('success', 'Distribusi berhasil & stok diperbarui');
    }
}
