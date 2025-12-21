@extends('layouts.guest2.app')

@section('title', 'Data Logistik Bencana')

@section('content')
<style>
    /* CSS agar tampilan persis seperti di gambar */
    body { background: linear-gradient(to bottom right, #198754, #198754); min-height: 100vh; }
    .container-box { background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    .circle-avatar {
        width: 70px; height: 70px; background-color: #198754; color: white;
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-weight: bold; font-size: 20px; margin: 0 auto 15px;
    }
    .card-item { border: 1px solid #eee; border-radius: 10px; padding: 15px; }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('dashboard.index') }}" class="btn btn-success">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <a href="{{ route('distribusi-logistik.create') }}" class="btn btn-warning fw-bold">
            <i class="bi bi-plus-circle"></i> Tambah Logistik
        </a>
    </div>

    <div class="container-box">
        <h4 class="text-success fw-bold mb-4"> Data Logistik Bencana</h4>

        <form method="GET" action="{{ route('distribusi-logistik.index') }}" class="row g-2 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama barang / sumber..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="kejadian" class="form-control">
                    <option value="">Semua Kejadian</option>
                    <option value="banjir">Banjir</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="bi bi-search"></i> Cari</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('distribusi-logistik.index') }}" class="btn btn-danger w-100"><i class="bi bi-x-circle"></i> Reset</a>
            </div>
        </form>

        <div class="row">
            @forelse ($distribusi as $d)
            <div class="col-md-4 mb-3">
                <div class="card-item text-center shadow-sm">
                    <div class="circle-avatar">
                        {{ strtoupper(substr($d->logistik->nama_barang ?? 'BA', 0, 2)) }}
                    </div>
                    <h5 class="fw-bold">{{ $d->logistik->nama_barang ?? 'Barang' }}</h5>

                    <div class="text-start ms-3 small">
                        <p class="mb-1"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Kejadian: <b>Banjir</b></p>
                        <p class="mb-1"><i class="bi bi-box-seam text-success"></i> Stok: <b>{{ $d->jumlah }} {{ $d->logistik->satuan ?? 'Unit' }}</b></p>
                        <p class="mb-3"><i class="bi bi-building text-primary"></i> Sumber: <b>{{ $d->penerima }}</b></p>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('distribusi-logistik.edit', $d->distribusi_id) }}" class="btn btn-primary btn-sm px-3">Edit</a>
                        <form action="{{ route('distribusi-logistik.destroy', $d->distribusi_id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm px-3">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center">Data tidak ditemukan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
