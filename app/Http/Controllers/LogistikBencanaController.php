<?php
namespace App\Http\Controllers;

use App\Models\KejadianBencana;
use App\Models\LogistikBencana;
use Illuminate\Http\Request;

class LogistikBencanaController extends Controller
{
    public function index(Request $request)
{
    $query = LogistikBencana::with('kejadian');

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nama_barang', 'like', '%' . $request->search . '%')
                ->orWhere('sumber', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->kejadian_id) {
        $query->where('kejadian_id', $request->kejadian_id);
    }

    // SORTING
    if ($request->sort == 'stok_terbanyak') {
        $query->orderBy('stok', 'desc');
    } elseif ($request->sort == 'stok_terendah') {
        $query->orderBy('stok', 'asc');
    } elseif ($request->sort == 'nama_az') {
        $query->orderBy('nama_barang', 'asc');
    } else {
        $query->orderBy('created_at', 'desc');
    }

    $logistik = $query->get();
    $kejadian = KejadianBencana::all();

    return view('pages.logistik.index', compact('logistik', 'kejadian'));
}

    public function create()
    {
        $kejadian = KejadianBencana::all();
        return view('pages.logistik.create', compact('kejadian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kejadian_id' => 'required|exists:kejadian_bencana,kejadian_id',
            'nama_barang' => 'required|string|max:255',
            'satuan'      => 'required|string|max:50',
            'stok'        => 'required|numeric|min:0',
            'sumber'      => 'required|string|max:255',
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
