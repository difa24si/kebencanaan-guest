@extends('layouts.guest2.app')

@section('content')
<div class="container mt-4">

    <h4>Tambah Distribusi Logistik</h4>

    <form action="{{ route('distribusi-logistik.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label>Barang</label>
            <select name="logistik_id" class="form-control">
                @foreach ($logistik as $l)
                    <option value="{{ $l->logistik_id }}">
                        {{ $l->nama_barang }} (Stok: {{ $l->stok }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Posko</label>
            <select name="posko_id" class="form-control">
                @foreach ($posko as $p)
                    <option value="{{ $p->posko_id }}">
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="date" name="tanggal" class="form-control mb-2">
        <input type="number" name="jumlah" class="form-control mb-2" placeholder="Jumlah">
        <input name="penerima" class="form-control mb-2" placeholder="Penerima">

        {{-- ✅ FILE --}}
        <div class="mb-3">
            <label>Dokumentasi (Foto / PDF)</label>
            <input type="file" name="file" class="form-control">
            <small class="text-muted">jpg, png, pdf (max 2MB)</small>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
