@extends('layouts.guest2.app')

@section('title', 'Tambah Logistik Bencana')

@section('content')
    <a href="{{ route('dashboard.index') }}" class="btn btn-success mb-3">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <div class="container-box mt-4 bg-light rounded shadow-sm p-4">

        <h4 class="fw-bold text-info mb-4">
            Tambah Logistik Bencana
        </h4>

        <form action="{{ route('logistik.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
            @csrf

            <!-- FIELD KEJADIAN -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                 Kejadian Bencana
                </label>
                <select name="kejadian_id" class="form-control" required>
                    <option value="">-- Pilih Kejadian --</option>
                    @foreach($kejadian as $k)
                        <option value="{{ $k->kejadian_id }}">
                            {{ $k->nama_kejadian ?? $k->jenis_bencana }}
                            @if($k->lokasi_text || $k->lokasi)
                                - {{ $k->lokasi_text ?? $k->lokasi }}
                            @endif
                        </option>
                    @endforeach
                </select>
                @error('kejadian_id')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- FIELD NAMA BARANG -->
            <div class="mb-3">
                <label class="form-label fw-bold">
               Nama Barang
                </label>
                <input type="text" name="nama_barang" class="form-control"
                       placeholder="Contoh: Beras, Air Mineral, Selimut, Obat"
                       value="{{ old('nama_barang') }}" required>
                @error('nama_barang')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- FIELD SATUAN -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                Satuan
                </label>
                <input type="text" name="satuan" class="form-control"
                       placeholder="Contoh: kg, liter, buah, dus, paket"
                       value="{{ old('satuan') }}" required>
                @error('satuan')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- FIELD STOK -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                Stok
                </label>
                <input type="number" name="stok" class="form-control"
                       placeholder="Jumlah stok"
                       value="{{ old('stok') }}"
                       min="0" step="1" required>
                @error('stok')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- FIELD SUMBER -->
            <div class="mb-4">
                <label class="form-label fw-bold">
                Sumber
                </label>
                <input type="text" name="sumber" class="form-control"
                       placeholder="Contoh: Donasi Masyarakat, Pemerintah, Perusahaan A"
                       value="{{ old('sumber') }}" required>
                @error('sumber')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- TOMBOL -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4">
                  Simpan
                </button>
                <a href="{{ route('logistik.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-circle me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
@endsection
