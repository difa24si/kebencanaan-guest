@extends('layouts.guest2.app')

@section('title', 'Edit Kejadian Bencana')

@section('content')
<div class="container mt-4">
    <h2 class="text-center fw-bold text-primary mb-4">
        <i class="bi bi-pencil-square"></i> Edit Kejadian Bencana
    </h2>

    <form action="{{ route('kejadian.update', $kejadian->kejadian_id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Jenis Bencana</label>
            <input type="text" name="jenis_bencana" class="form-control"
                   value="{{ old('jenis_bencana', $kejadian->jenis_bencana) }}">
            @error('jenis_bencana') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Kejadian</label>
            <input type="date" name="tanggal" class="form-control"
                   value="{{ old('tanggal', $kejadian->tanggal) }}">
            @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi (Teks)</label>
            <textarea name="lokasi_text" class="form-control" rows="3">{{ old('lokasi_text', $kejadian->lokasi_text) }}</textarea>
            @error('lokasi_text') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">RT</label>
                <input type="text" name="rt" class="form-control" maxlength="5"
                       value="{{ old('rt', $kejadian->rt) }}">
                @error('rt') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">RW</label>
                <input type="text" name="rw" class="form-control" maxlength="5"
                       value="{{ old('rw', $kejadian->rw) }}">
                @error('rw') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Dampak</label>
            <input type="text" name="dampak" class="form-control"
                   value="{{ old('dampak', $kejadian->dampak) }}">
            @error('dampak') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status Kejadian</label>
            <select name="status_kejadian" class="form-control">
                <option value="Ringan" {{ $kejadian->status_kejadian == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                <option value="Sedang" {{ $kejadian->status_kejadian == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Berat"  {{ $kejadian->status_kejadian == 'Berat'  ? 'selected' : '' }}>Berat</option>
                <option value="Selesai" {{ $kejadian->status_kejadian == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            @error('status_kejadian') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan', $kejadian->keterangan) }}</textarea>
            @error('keterangan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('kejadian.index') }}" class="btn btn-secondary px-4">Kembali</a>
            <button type="submit" class="btn btn-primary px-4">Update</button>
        </div>
    </form>
</div>
@endsection
