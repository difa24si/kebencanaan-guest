@extends('layouts.guest.app')

@section('title', 'Data Warga')

@section('content')
<div class="container py-5">

    {{-- HEADER BUTTON --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('dashboard.index') }}" class="btn btn-success fw-bold">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>

        <a href="{{ route('warga.create') }}" class="btn btn-warning text-white fw-bold">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    </div>

    {{-- CARD WRAPPER --}}
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

        {{-- HEADER --}}
        <div class="card-header text-white fw-semibold"
             style="background: linear-gradient(90deg, #27ae60, #2ecc71);">
            <i class="bi bi-people-fill me-2"></i> Data Warga
        </div>

        <div class="card-body bg-light">

            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="alert alert-success rounded-3">
                    <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                </div>
            @endif

            {{-- SEARCH & FILTER --}}
            <form method="GET" class="mb-4">
                <div class="row g-3">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari nama / KTP / pekerjaan..."
                               value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="gender" class="form-select">
                            <option value="">Semua Gender</option>
                            <option value="Laki-laki" {{ request('gender')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                            <option value="Perempuan" {{ request('gender')=='Perempuan'?'selected':'' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="agama" class="form-select">
                            <option value="">Semua Agama</option>
                            <option value="Islam" {{ request('agama')=='Islam'?'selected':'' }}>Islam</option>
                            <option value="Kristen" {{ request('agama')=='Kristen'?'selected':'' }}>Kristen</option>
                            <option value="Katolik" {{ request('agama')=='Katolik'?'selected':'' }}>Katolik</option>
                            <option value="Hindu" {{ request('agama')=='Hindu'?'selected':'' }}>Hindu</option>
                            <option value="Buddha" {{ request('agama')=='Buddha'?'selected':'' }}>Buddha</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-success w-100">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            {{-- GRID LIST --}}
            <div class="row g-4">
                @forelse ($warga as $item)
                    <div class="col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm text-center p-3 h-100"
                             style="border-radius: 15px; transition: 0.3s; background:white; position: relative;">

                            {{-- Avatar --}}
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=27ae60&color=fff"
                                 class="rounded-circle mx-auto mb-3"
                                 width="75" height="75"
                                 style="border: 3px solid #27ae60; object-fit: cover;">

                            {{-- Name --}}
                            <h5 class="fw-semibold mb-0">{{ $item->nama }}</h5>
                            <p class="text-muted small mb-1">{{ $item->pekerjaan }}</p>

                            {{-- Badge --}}
                            <span class="badge bg-success mb-2">{{ $item->agama }}</span>

                            {{-- Detail --}}
                            <div class="mt-2 small text-secondary">
                                <p class="mb-1"><i class="bi bi-gender-ambiguous me-1"></i>{{ $item->gender }}</p>
                                <p class="mb-1"><i class="bi bi-telephone me-1"></i>{{ $item->phone }}</p>
                                <p class="mb-1"><i class="bi bi-envelope me-1"></i>{{ $item->email }}</p>
                            </div>
{{-- TOMBOL EDIT & HAPUS --}}
<div class="mt-3 pt-3 border-top">
    <div class="d-flex justify-content-center gap-2">
        {{-- Tombol Edit --}}
<a href="/warga/{{ $item->id }}/edit"
   class="btn btn-sm btn-outline-primary px-3">
    <i class="bi bi-pencil me-1"></i> Edit
</a>

{{-- Tombol Hapus --}}
<form action="/warga/{{ $item->id }}" method="POST"
      class="d-inline"
      onsubmit="return confirm('Yakin ingin menghapus data warga ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger px-3">
        <i class="bi bi-trash me-1"></i> Hapus
    </button>
</form>
    </div>
</div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-info-circle"></i> Belum ada data warga.
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $warga->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection
