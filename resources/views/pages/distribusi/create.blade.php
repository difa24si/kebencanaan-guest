@extends('layouts.guest2.app')

@section('content')
<div class="container mt-4">

    <h4>Tambah Distribusi Logistik</h4>

    <form action="{{ route('distribusi-logistik.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label>Barang</label>
            <select name="logistik_id" class="form-control">
                @foreach($logistik as $l)
                    <option value="{{ $l->logistik_id }}">
                        {{ $l->nama_barang }} (Stok: {{ $l->stok }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Posko</label>
            <select name="posko_id" class="form-control">
                @foreach($posko as $p)
                    <option value="{{ $p->posko_id }}">
                        {{ $p->nama_posko }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="date" name="tanggal" class="form-control mb-2">
        <input type="number" name="jumlah" class="form-control mb-2" placeholder="Jumlah">
        <input name="penerima" class="form-control mb-2" placeholder="Penerima">

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
