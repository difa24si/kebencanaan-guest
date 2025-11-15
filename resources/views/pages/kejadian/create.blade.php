@extends('layouts.guest2.app')

@section('title', 'Tambah Kejadian Bencana')

@section('content')
<div class="container mt-4">
    <h2 class="text-center fw-bold text-success mb-4">
        <i class="bi bi-plus-circle-fill"></i> Tambah Kejadian Bencana
    </h2>

    <form action="{{ route('kejadian.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Jenis Bencana</label>
            <input type="text" name="jenis_bencana" class="form-control"
                   value="{{ old('jenis_bencana') }}">
            @error('jenis_bencana') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Kejadian</label>
            <input type="date" name="tanggal" class="form-control"
                   value="{{ old('tanggal') }}">
            @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi (Teks)</label>
            <textarea name="lokasi_text" class="form-control" rows="3">{{ old('lokasi_text') }}</textarea>
            @error('lokasi_text') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">RT</label>
                <input type="text" name="rt" class="form-control" maxlength="5"
                       value="{{ old('rt') }}">
                @error('rt') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">RW</label>
                <input type="text" name="rw" class="form-control" maxlength="5"
                       value="{{ old('rw') }}">
                @error('rw') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Dampak</label>
            <input type="text" name="dampak" class="form-control"
                   value="{{ old('dampak') }}">
            @error('dampak') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status Kejadian</label>
            <select name="status_kejadian" class="form-control">
                <option value="" hidden>-- Pilih Status --</option>
                <option value="Ringan">Ringan</option>
                <option value="Sedang" selected>Sedang</option>
                <option value="Berat">Berat</option>
                <option value="Selesai">Selesai</option>
            </select>
            @error('status_kejadian') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan') }}</textarea>
            @error('keterangan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('kejadian.index') }}" class="btn btn-secondary px-4">Kembali</a>
            <button type="submit" class="btn btn-success px-4">Simpan</button>
        </div>
    </form>
</div>
@endsection
