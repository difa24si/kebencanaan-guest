@extends('layouts.guest2.app')

@section('content')
    <div class="container">
        <h4>Tambah Logistik Bencana</h4>

        <form action="{{ route('logistik.store') }}" method="POST">
            @csrf

            <div class="mb-2">
                <label>Kejadian</label>
                <option value="{{ $k->kejadian_id }}" {{ request('kejadian_id') == $k->kejadian_id ? 'selected' : '' }}>
                    {{ $k->jenis_bencana }}
                </option>
            </div>

            <input name="nama_barang" class="form-control mb-2" placeholder="Nama Barang">
            <input name="satuan" class="form-control mb-2" placeholder="Satuan">
            <input name="stok" type="number" class="form-control mb-2" placeholder="Stok">
            <input name="sumber" class="form-control mb-2" placeholder="Sumber">

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
