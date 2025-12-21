<?php
namespace App\Http\Controllers;

use App\Models\DonasiBencana;
use App\Models\KejadianBencana;
use App\Models\Media;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $kejadianFilter = $request->kejadian_id;

        // Query dengan eager loading
        $query = DonasiBencana::with('kejadian');

        // FILTER berdasarkan kejadian
        if (!empty($kejadianFilter)) {
            $query->where('kejadian_id', $kejadianFilter);
        }

        // SEARCH
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('donatur_name', 'like', '%' . $search . '%')
                  ->orWhere('jenis', 'like', '%' . $search . '%');
            });
        }

        $donasi = $query->paginate(9)->withQueryString();

        // Data dropdown kejadian untuk filter
        $kejadian = KejadianBencana::all();

        return view('pages.donasi.index', compact('donasi', 'kejadian'));
    }

    // HALAMAN FORM INPUT DONASI
    public function create()
    {
        $kejadian = KejadianBencana::all();
        return view('pages.donasi.create', compact('kejadian'));
    }

    // SIMPAN DONASI + UPLOAD FILE
    public function store(Request $request)
    {
        $request->validate([
            'kejadian_id'  => 'required|exists:kejadian_bencana,kejadian_id',
            'donatur_name' => 'required|string|max:255',
            'jenis'        => 'required|string|max:100',
            'nilai'        => 'required|numeric',
            'files.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:5120',
        ]);

        // SIMPAN DATA DONASI
        $donasi = DonasiBencana::create([
            'kejadian_id'  => $request->kejadian_id,
            'donatur_name' => $request->donatur_name,
            'jenis'        => $request->jenis,
            'nilai'        => $request->nilai,
        ]);

        $donasi_id = $donasi->donasi_id;

        // UPLOAD FILE MULTIPLE
        if ($request->hasFile('files')) {

            $sort = 1;

            foreach ($request->file('files') as $file) {

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('donasi', $filename, 'public');

                Media::create([
                    'ref_table'  => 'donasi_bencana',
                    'ref_id'     => $donasi_id,
                    'file_name'  => $filename,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $sort++,
                    'caption'    => null,
                ]);
            }
        }

        // PERBAIKAN DI SINI: ganti 'donasi.detail' dengan 'donasi.show'
        return redirect()->route('donasi.show', $donasi_id)
            ->with('success', 'Donasi berhasil ditambahkan!');
    }

    // HALAMAN DETAIL DONASI (SHOW)
    public function show($id)
    {
        $donasi = DonasiBencana::findOrFail($id);

        $media = Media::where('ref_table', 'donasi_bencana')
            ->where('ref_id', $id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.donasi.detail', compact('donasi', 'media'));
    }

    // HALAMAN EDIT DONASI
    public function edit($id)
    {
        $donasi = DonasiBencana::findOrFail($id);
        $kejadian = KejadianBencana::all();
        $media = Media::where('ref_table', 'donasi_bencana')
            ->where('ref_id', $id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.donasi.edit', compact('donasi', 'kejadian', 'media'));
    }

    // UPDATE DONASI
    public function update(Request $request, $id)
    {
        $donasi = DonasiBencana::findOrFail($id);

        $request->validate([
            'kejadian_id'  => 'required|exists:kejadian_bencana,kejadian_id',
            'donatur_name' => 'required|string|max:255',
            'jenis'        => 'required|string|max:100',
            'nilai'        => 'required|numeric',
            'files.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:5120',
        ]);

        $donasi->update([
            'kejadian_id'  => $request->kejadian_id,
            'donatur_name' => $request->donatur_name,
            'jenis'        => $request->jenis,
            'nilai'        => $request->nilai,
        ]);

        // UPLOAD FILE BARU JIKA ADA
        if ($request->hasFile('files')) {
            $sort = Media::where('ref_table', 'donasi_bencana')
                        ->where('ref_id', $id)
                        ->max('sort_order') ?? 0;

            foreach ($request->file('files') as $file) {
                $sort++;

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('donasi', $filename, 'public');

                Media::create([
                    'ref_table'  => 'donasi_bencana',
                    'ref_id'     => $id,
                    'file_name'  => $filename,
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $sort,
                    'caption'    => null,
                ]);
            }
        }

        return redirect()->route('donasi.show', $id)
            ->with('success', 'Donasi berhasil diperbarui!');
    }

    // HAPUS DONASI

    public function destroy($id)
    {
        $donasi = DonasiBencana::findOrFail($id);

        // Hapus file media terkait
        $media = Media::where('ref_table', 'donasi_bencana')
                     ->where('ref_id', $id)
                     ->get();

        foreach ($media as $file) {
            // Hapus dari storage
            if (file_exists(storage_path('app/public/donasi/' . $file->file_name))) {
                unlink(storage_path('app/public/donasi/' . $file->file_name));
            }
            $file->delete();
        }

        $donasi->delete();

        return redirect()->route('donasi.index')
            ->with('success', 'Donasi berhasil dihapus!');
    }
}
