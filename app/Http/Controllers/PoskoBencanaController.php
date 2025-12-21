<?php

namespace App\Http\Controllers;

use App\Models\PoskoBencana;
use App\Models\KejadianBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoskoBencanaController extends Controller
{
    /**
     * Tampilkan semua data posko + Pagination + Search + Filter
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $kejadianFilter = $request->kejadian_id;

        $query = PoskoBencana::with('kejadian');

        // FILTER berdasarkan kejadian
        if (!empty($kejadianFilter)) {
            $query->where('kejadian_id', $kejadianFilter);
        }

        // SEARCH
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('alamat', 'like', '%' . $search . '%')
                  ->orWhere('kontak', 'like', '%' . $search . '%')
                  ->orWhere('penanggung_jawab', 'like', '%' . $search . '%');
            });
        }

        // PAGINATION — tampilkan 9 data per halaman
        $data['posko'] = $query->paginate(9)->withQueryString();

        // Data dropdown kejadian
        $data['kejadian'] = KejadianBencana::all();

        // Untuk form tetap terisi
        $data['search'] = $search;
        $data['kejadianFilter'] = $kejadianFilter;

        return view('pages.posko.index-posko', $data);
    }

    /**
     * Form tambah posko
     */
    public function create()
    {
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

        if ($request->hasFile('foto')) {
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

        if ($posko->foto && Storage::disk('public')->exists($posko->foto)) {
            Storage::disk('public')->delete($posko->foto);
        }

        $posko->delete();

        return redirect()->route('posko.index')->with('success', 'Data posko berhasil dihapus!');
    }
}

