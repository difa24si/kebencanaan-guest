@extends('layouts.guest2.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-body p-4">
            <h4 class="fw-bold text-primary mb-4">Tambah Distribusi Logistik</h4>

            <form action="{{ route('distribusi-logistik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Pilih Barang</label>
                    <select name="logistik_id" class="form-control">
                        @foreach ($logistik as $l)
                            <option value="{{ $l->logistik_id }}">{{ $l->nama_barang }} (Stok: {{ $l->stok }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Posko</label>
                    <select name="posko_id" class="form-control">
                        @foreach ($posko as $p)
                            <option value="{{ $p->posko_id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="0" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Penerima / Sumber</label>
                    <input name="penerima" class="form-control" placeholder="Contoh: Relawan Pekanbaru" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Dokumentasi (Foto/PDF)</label>
                    <input type="file" name="file" class="form-control">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="{{ route('distribusi-logistik.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
