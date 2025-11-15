<?php

namespace App\Http\Controllers;

use App\Models\PoskoBencana;
use App\Models\KejadianBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoskoBencanaController extends Controller
{
    /**
     * Tampilkan semua data posko beserta data kejadiannya
     */
    public function index()
    {
        // Ambil posko + relasi kejadian
        $data['posko'] = PoskoBencana::with('kejadian')->get();

        return view('pages.posko.index-posko', $data);
    }

    /**
     * Form tambah posko
     */
    public function create()
    {
        // Ambil semua kejadian untuk dropdown
        $kejadian = KejadianBencana::all();

        return view('pages.posko.form-posko', compact('kejadian'));
    }

    /**
     * Simpan data posko baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kejadian_id'       => 'required|integer|exists:kejadian_bencana,kejadian_id',
            'nama'              => 'required|string|max:100',
            'alamat'            => 'required|string',
            'kontak'            => 'required|string|max:20',
            'penanggung_jawab'  => 'required|string|max:100',
            'foto'              => 'nullable|image|max:2048',
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_posko', 'public');
        }

        PoskoBencana::create($validated);

        return redirect()->route('posko.index')->with('success', 'Data posko berhasil ditambahkan!');
    }

    /**
     * Form edit posko
     */
    public function edit($id)
    {
        $posko = PoskoBencana::with('kejadian')->findOrFail($id);
        $kejadian = KejadianBencana::all();

        return view('pages.posko.form-posko', compact('posko', 'kejadian'));
    }

    /**
     * Update data posko
     */
    public function update(Request $request, $id)
    {
        $posko = PoskoBencana::findOrFail($id);

        $validated = $request->validate([
            'kejadian_id'       => 'required|integer|exists:kejadian_bencana,kejadian_id',
            'nama'              => 'required|string|max:100',
            'alamat'            => 'required|string',
            'kontak'            => 'required|string|max:20',
            'penanggung_jawab'  => 'required|string|max:100',
            'foto'              => 'nullable|image|max:2048',
        ]);

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($posko->foto && Storage::disk('public')->exists($posko->foto)) {
                Storage::disk('public')->delete($posko->foto);
            }

            $validated['foto'] = $request->file('foto')->store('foto_posko', 'public');
        }

        $posko->update($validated);

        return redirect()->route('posko.index')->with('success', 'Data posko berhasil diperbarui!');
    }

    /**
     * Hapus posko
     */
    public function destroy($id)
    {
        $posko = PoskoBencana::findOrFail($id);

        // Hapus foto jika ada
        if ($posko->foto && Storage::disk('public')->exists($posko->foto)) {
            Storage::disk('public')->delete($posko->foto);
        }

        $posko->delete();

        return redirect()->route('posko.index')->with('success', 'Data posko berhasil dihapus!');
    }
}
