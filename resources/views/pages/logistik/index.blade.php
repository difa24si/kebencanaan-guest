@extends('layouts.guest2.app')

@section('title', 'Data Logistik Bencana')

@section('content')
    <a href="{{ route('dashboard.index') }}" class="btn btn-success mb-3">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <a href="{{ route('logistik.create') }}" class="btn btn-warning float-end mb-3">
       Tambah Logistik
    </a>

    <div class="container-box mt-4 bg-light rounded shadow-sm p-4">

        <h4 class="fw-bold text-success mb-4">
        Data Logistik Bencana
        </h4>

        <!-- SEARCH & FILTER -->
        <form method="GET" action="{{ route('logistik.index') }}" class="row g-2 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari nama barang / sumber..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="kejadian_id" class="form-control">
                    <option value="">Semua Kejadian</option>
                    @foreach($kejadian as $k)
                        <option value="{{ $k->kejadian_id }}"
                            {{ request('kejadian_id') == $k->kejadian_id ? 'selected' : '' }}>
                            {{ $k->nama_kejadian ?? $k->jenis_bencana }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>

            <div class="col-md-3">
                <a href="{{ route('logistik.index') }}" class="btn btn-danger w-100">
                    <i class="bi bi-x-circle"></i> Reset
                </a>
            </div>
        </form>

        <!-- CARD LIST -->
        <div class="row">
            @forelse ($logistik as $l)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">

                            <!-- AVATAR -->
                            <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center fw-bold text-white"
                                 style="
                                    width:70px;
                                    height:70px;
                                    background-color:#198754;  <!-- WARNA HIJAU SAMA -->
                                    font-size:20px;
                                 ">
                                {{ strtoupper(substr($l->nama_barang, 0, 2)) }}
                            </div>

                            <h5 class="fw-bold">{{ $l->nama_barang }}</h5>

                            <!-- KEJADIAN -->
                            <p class="text-muted mb-1">
                                <i class="bi bi-exclamation-triangle-fill text-danger"></i>
                                Kejadian:
                                <strong>{{ $l->kejadian->nama_kejadian ?? $l->kejadian->jenis_bencana ?? 'Tidak ada data' }}</strong>
                            </p>

                            <!-- STOK -->
                            <p class="text-muted mb-1">
                                <i class="bi bi-box-fill text-success"></i>
                                Stok:
                                <span class="fw-bold {{ $l->stok < 10 ? 'text-danger' : 'text-dark' }}">
                                    {{ $l->stok }} {{ $l->satuan }}
                                </span>
                                @if($l->stok < 10)
                                    <span class="badge bg-danger ms-1">Kritis!</span>
                                @endif
                            </p>

                            <!-- SUMBER -->
                            <p class="text-muted mb-2">
                                <i class="bi bi-building-fill text-primary"></i>
                                Sumber:
                                <strong>{{ $l->sumber }}</strong>
                            </p>

                            <!-- TOMBOL ACTION -->
                            <hr class="my-3">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('logistik.edit', $l->logistik_id) }}"
                                   class="btn btn-sm btn-primary"
                                   title="Edit Logistik">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('logistik.destroy', $l->logistik_id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Hapus logistik {{ $l->nama_barang }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="text-muted">Tidak ada data logistik</h5>
                    <p class="text-muted">Mulai tambahkan data logistik pertama Anda</p>
                    <a href="{{ route('logistik.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Logistik
                    </a>
                </div>
            @endforelse
        </div>

    </div>
@endsection
