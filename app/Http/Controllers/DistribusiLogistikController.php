<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\DistribusiLogistik;
use App\Models\LogistikBencana;
use App\Models\PoskoBencana;
use App\Models\Media;

class DistribusiLogistikController extends Controller
{
    // 1️⃣ tampil data
    public function index()
    {
        $distribusi = DistribusiLogistik::with(['logistik', 'posko', 'media'])->get();
        return view('pages.distribusi.index', compact('distribusi'));
    }

    // 2️⃣ form tambah
    public function create()
    {
        $logistik = LogistikBencana::all();
        $posko = PoskoBencana::all();

        return view('pages.distribusi.create', compact('logistik', 'posko'));
    }

    // 3️⃣ simpan + kurangi stok + upload file
    public function store(Request $request)
    {
        $request->validate([
            'logistik_id' => 'required',
            'posko_id' => 'required',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
            'penerima' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        DB::transaction(function () use ($request) {

            $logistik = LogistikBencana::findOrFail($request->logistik_id);

            if ($request->jumlah > $logistik->stok) {
                throw new \Exception('Stok tidak mencukupi');
            }

            // ✅ simpan distribusi
            $distribusi = DistribusiLogistik::create(
                $request->only([
                    'logistik_id',
                    'posko_id',
                    'tanggal',
                    'jumlah',
                    'penerima',
                ])
            );

            // ✅ upload file ke tabel media
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('media/distribusi_logistik', 'public');

                Media::create([
                    'ref_table' => 'distribusi_logistik',
                    'ref_id' => $distribusi->distribusi_id,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => 0,
                ]);
            }

            // ✅ kurangi stok
            $logistik->decrement('stok', $request->jumlah);
        });

        return redirect()->route('distribusi-logistik.index')
            ->with('success', 'Distribusi berhasil & stok diperbarui');
    }
}
