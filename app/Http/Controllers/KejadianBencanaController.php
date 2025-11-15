<?php

namespace App\Http\Controllers;

use App\Models\KejadianBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KejadianBencanaController extends Controller
{
    /**
     * Tampilkan semua data kejadian bencana.
     */
    public function index()
    {
        $kejadian = KejadianBencana::latest()->get();
        return view('pages.kejadian.index', compact('kejadian'));
    }

    /**
     * Form tambah kejadian baru.
     */
    public function create()
    {
        return view('pages.kejadian.create');
    }

    /**
     * Simpan kejadian baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_bencana'   => 'required|string|max:100',
            'tanggal'         => 'required|date',
            'lokasi_text'     => 'required|string',
            'rt'              => 'nullable|string|max:5',
            'rw'              => 'nullable|string|max:5',
            'dampak'          => 'nullable|string',
            'status_kejadian' => 'required|string|max:50',
            'keterangan'      => 'nullable|string',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kejadian_bencana', 'public');
        }

        KejadianBencana::create([
            'jenis_bencana'   => $request->jenis_bencana,
            'tanggal'         => $request->tanggal,
            'lokasi_text'     => $request->lokasi_text,
            'rt'              => $request->rt,
            'rw'              => $request->rw,
            'dampak'          => $request->dampak,
            'status_kejadian' => $request->status_kejadian,
            'keterangan'      => $request->keterangan,
            'foto'            => $fotoPath,
        ]);

        return redirect()->route('kejadian.index')->with('success', 'Data kejadian berhasil ditambahkan.');
    }

    /**
     * Form edit kejadian.
     */
    public function edit($id)
    {
        $kejadian = KejadianBencana::findOrFail($id);
        return view('pages.kejadian.edit', compact('kejadian'));
    }

    /**
     * Update data kejadian.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_bencana'   => 'required|string|max:100',
            'tanggal'         => 'required|date',
            'lokasi_text'     => 'required|string',
            'rt'              => 'nullable|string|max:5',
            'rw'              => 'nullable|string|max:5',
            'dampak'          => 'nullable|string',
            'status_kejadian' => 'required|string|max:50',
            'keterangan'      => 'nullable|string',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $kejadian = KejadianBencana::findOrFail($id);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kejadian->foto && Storage::disk('public')->exists($kejadian->foto)) {
                Storage::disk('public')->delete($kejadian->foto);
            }

            $fotoPath = $request->file('foto')->store('kejadian_bencana', 'public');
        } else {
            $fotoPath = $kejadian->foto;
        }

        $kejadian->update([
            'jenis_bencana'   => $request->jenis_bencana,
            'tanggal'         => $request->tanggal,
            'lokasi_text'     => $request->lokasi_text,
            'rt'              => $request->rt,
            'rw'              => $request->rw,
            'dampak'          => $request->dampak,
            'status_kejadian' => $request->status_kejadian,
            'keterangan'      => $request->keterangan,
            'foto'            => $fotoPath,
        ]);

        return redirect()->route('kejadian.index')->with('success', 'Data kejadian berhasil diperbarui.');
    }

    /**
     * Hapus kejadian.
     */
    public function destroy($id)
    {
        $kejadian = KejadianBencana::findOrFail($id);

        // Hapus foto jika ada
        if ($kejadian->foto && Storage::disk('public')->exists($kejadian->foto)) {
            Storage::disk('public')->delete($kejadian->foto);
        }

        $kejadian->delete();

        return redirect()->route('kejadian.index')->with('success', 'Data kejadian berhasil dihapus.');
    }
}
