@extends('layouts.guest2.app')

@section('title', 'Data Donasi Bencana')

@section('content')
    <a href="{{ route('dashboard.index') }}" class="btn btn-success mb-3">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <a href="{{ route('donasi.create') }}" class="btn btn-warning float-end mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Donasi
    </a>

    <div class="container-box mt-4 bg-light rounded shadow-sm p-4">

        <h4 class="fw-bold text-primary mb-4">
             Data Donasi Bencana
        </h4>

        <!-- SEARCH & FILTER -->
        <form method="GET" action="{{ route('donasi.index') }}" class="row g-2 mb-4">

            <div class="col-md-4">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari nama donatur / jenis donasi..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <select name="kejadian_id" class="form-control">
                    <option value="">-- Semua Kejadian --</option>
                    @foreach($kejadian as $k)
                        <option value="{{ $k->kejadian_id }}"
                            {{ request('kejadian_id') == $k->kejadian_id ? 'selected' : '' }}>
                            {{ $k->nama_kejadian }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('donasi.index') }}" class="btn btn-danger w-100">
                    <i class="bi bi-x-circle"></i> Reset
                </a>
            </div>

        </form>

        <!-- CARD LIST -->
        <div class="row">
            @forelse ($donasi as $d)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">

                            <!-- AVATAR -->
                            <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center fw-bold text-white"
                                 style="
                                    width:70px;
                                    height:70px;
                                    background-color:#0d6efd;
                                    font-size:20px;
                                 ">
                                {{ strtoupper(substr($d->donatur_name, 0, 2)) }}
                            </div>

                            <h5 class="fw-bold">{{ $d->donatur_name }}</h5>

                            <p class="text-muted mb-1">
                                <i class="bi bi-tag-fill text-success"></i>
                                Jenis: {{ $d->jenis }}
                            </p>

                            <p class="text-muted mb-1">
                                <i class="bi bi-cash-stack text-warning"></i>
                                Nilai: <strong>Rp {{ number_format($d->nilai) }}</strong>
                            </p>

                            <p class="text-muted mb-2">
                                <i class="bi bi-exclamation-triangle-fill text-danger"></i>
                                Kejadian:
                                <strong>{{ $d->kejadian->jenis_bencana ?? 'Tidak ada data' }}</strong>
                            </p>

                            <!-- TAMBAHAN TOMBOL EDIT DAN HAPUS -->
                            <hr class="my-3">

                            <!-- TOMBOL ACTION -->
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Detail -->
                                <a href="{{ route('donasi.show', $d->donasi_id) }}"
                                   class="btn btn-sm btn-info"
                                   title="Lihat Detail">
                                    <i class="bi bi-eye"></i> Detail
                                </a>

                                <!-- Tombol Edit -->
                                <a href="{{ route('donasi.edit', $d->donasi_id) }}"
                                   class="btn btn-sm btn-primary"
                                   title="Edit Donasi">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('donasi.destroy', $d->donasi_id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus donasi dari {{ $d->donatur_name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Donasi">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted"></i>
                    <p class="text-muted mt-3">Belum ada data donasi</p>
                    <a href="{{ route('donasi.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Donasi Pertama
                    </a>
                </div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        @if($donasi->count() > 0)
        <div class="d-flex justify-content-center mt-3">
            {{ $donasi->links('pagination::bootstrap-5') }}
        </div>
        @endif

    </div>
@endsection
