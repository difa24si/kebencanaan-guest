<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $query = Warga::query();

        // 🔍 Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('no_ktp', 'LIKE', '%'.$request->search.'%')
                  ->orWhere('pekerjaan', 'LIKE', '%'.$request->search.'%');
            });
        }

        //  Filter Gender
        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        // Filter Agama
        if ($request->agama) {
            $query->where('agama', $request->agama);
        }

        //  Pagination
        $warga = $query->paginate(8);

        return view('pages.warga.index', compact('warga'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required|string|max:100',
            'gender' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        $data = [
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        Warga::create($data);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil disimpan!');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'gender' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
