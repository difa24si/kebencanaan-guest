<?php

namespace App\Http\Controllers;

use App\Models\KejadianBencana;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KejadianBencanaController extends Controller
{
    /**
     * Tampilkan semua data kejadian bencana
     */
    public function index(Request $request)
    {
        $query = KejadianBencana::query();

        if ($request->search) {
            $query->where('jenis_bencana', 'like', '%' . $request->search . '%')
                  ->orWhere('lokasi_text', 'like', '%' . $request->search . '%');
        }

        if ($request->jenis_bencana) {
            $query->where('jenis_bencana', $request->jenis_bencana);
        }

        if ($request->status_kejadian) {
            $query->where('status_kejadian', $request->status_kejadian);
        }

        $kejadian = $query->with('media')->latest()->paginate(6)->withQueryString();

        return view('pages.kejadian.index', compact('kejadian'));
    }

    public function create()
    {
        return view('pages.kejadian.create');
    }

    /**
     * SIMPAN DATA + MEDIA
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
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 🔹 Simpan kejadian
        $kejadian = KejadianBencana::create([
            'jenis_bencana'   => $request->jenis_bencana,
            'tanggal'         => $request->tanggal,
            'lokasi_text'     => $request->lokasi_text,
            'rt'              => $request->rt,
            'rw'              => $request->rw,
            'dampak'          => $request->dampak,
            'status_kejadian' => $request->status_kejadian,
            'keterangan'      => $request->keterangan,
        ]);

        // 🔹 Simpan media (foto)
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('media/kejadian_bencana', 'public');

            Media::create([
                'ref_table' => 'kejadian_bencana',
                'ref_id' => $kejadian->getKey(),
                'file_name' => $path,
                'mime_type' => $file->getClientMimeType(),
                'sort_order'=> 0,
            ]);
        }

        return redirect()->route('kejadian.index')
            ->with('success', 'Data kejadian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kejadian = KejadianBencana::with('media')->findOrFail($id);
        return view('pages.kejadian.edit', compact('kejadian'));
    }

    /**
     * UPDATE DATA + GANTI MEDIA
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
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kejadian = KejadianBencana::findOrFail($id);

        $kejadian->update([
            'jenis_bencana'   => $request->jenis_bencana,
            'tanggal'         => $request->tanggal,
            'lokasi_text'     => $request->lokasi_text,
            'rt'              => $request->rt,
            'rw'              => $request->rw,
            'dampak'          => $request->dampak,
            'status_kejadian' => $request->status_kejadian,
            'keterangan'      => $request->keterangan,
        ]);

        // 🔹 Jika upload foto baru → hapus lama → simpan baru
        if ($request->hasFile('foto')) {
            $mediaLama = Media::where('ref_table', 'kejadian_bencana')
                              ->where('ref_id', $kejadian->id)
                              ->first();

            if ($mediaLama && Storage::disk('public')->exists($mediaLama->file_name)) {
                Storage::disk('public')->delete($mediaLama->file_name);
                $mediaLama->delete();
            }

            $file = $request->file('foto');
            $path = $file->store('media/kejadian_bencana', 'public');

            Media::create([
                'ref_table' => 'kejadian_bencana',
                'ref_id' => $kejadian->getKey(),
                'file_name' => $path,
                'mime_type' => $file->getClientMimeType(),
                'sort_order'=> 0,
            ]);
        }

        return redirect()->route('kejadian.index')
            ->with('success', 'Data kejadian berhasil diperbarui.');
    }

    /**
     * HAPUS DATA + MEDIA
     */
    public function destroy($id)
    {
        $kejadian = KejadianBencana::findOrFail($id);

        $media = Media::where('ref_table', 'kejadian_bencana')
                      ->where('ref_id', $kejadian->id)
                      ->get();

        foreach ($media as $item) {
            if (Storage::disk('public')->exists($item->file_name)) {
                Storage::disk('public')->delete($item->file_name);
            }
            $item->delete();
        }

        $kejadian->delete();

        return redirect()->route('kejadian.index')
            ->with('success', 'Data kejadian berhasil dihapus.');
    }
}
