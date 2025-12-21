@extends('layouts.guest2.app')

@section('title', 'Data Posko Bencana')

@section('content')
    <a href="{{ route('dashboard.index') }}" class="btn btn-success mb-3">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <a href="{{ route('posko.create') }}" class="btn btn-warning float-end mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Posko
    </a>

    <div class="container-box mt-4 bg-light rounded shadow-sm p-4">

        <h4 class="fw-bold text-success mb-4">
         Data Posko Bencana
        </h4>

        <!-- SEARCH & FILTER -->
        <form method="GET" action="{{ route('posko.index') }}" class="row g-2 mb-4">

            <div class="col-md-4">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari nama posko / alamat / kontak / PJ..."
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
                <a href="{{ route('posko.index') }}" class="btn btn-danger w-100">
                    <i class="bi bi-x-circle"></i> Reset
                </a>
            </div>

        </form>

        <!-- CARD LIST -->
        <div class="row">
            @foreach ($posko as $p)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">

                            <!-- AVATAR -->
                            <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center fw-bold text-white"
                                 style="
                                    width:70px;
                                    height:70px;
                                    background-color:#198754;
                                    font-size:20px;
                                    {{ $p->foto ? 'background-image:url(' . asset('storage/' . $p->foto) . ');background-size:cover;background-position:center;color:transparent;' : '' }}
                                 ">
                                @if(!$p->foto)
                                    {{ strtoupper(substr($p->nama, 0, 2)) }}
                                @endif
                            </div>

                            <h5 class="fw-bold">{{ $p->nama }}</h5>

                            <p class="text-muted mb-1">
                                Alamat: {{ $p->alamat }}
                            </p>

                            <p class="text-muted mb-1">
                                <i class="bi bi-telephone-fill text-primary"></i>
                                Kontak: {{ $p->kontak }}
                            </p>

                            <p class="text-muted mb-2">
                                <i class="bi bi-person-fill text-warning"></i>
                                Penanggung Jawab:
                                <strong>{{ $p->penanggung_jawab }}</strong>
                            </p>

                            <!-- TAMBAHAN TOMBOL EDIT DAN HAPUS -->
                            <hr class="my-3">

                            <!-- TOMBOL ACTION -->
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('posko.edit', $p->posko_id) }}"
                                   class="btn btn-sm btn-primary"
                                   title="Edit Posko">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <a href="#"
                                   onclick="if(confirm('Hapus {{ $p->nama }}?')) {
                                        document.getElementById('hapus-form-{{ $p->posko_id }}').submit();
                                    }"
                                   class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>

                                <form id="hapus-form-{{ $p->posko_id }}"
                                      action="{{ route('posko.destroy', $p->posko_id) }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center mt-3">
            {{ $posko->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
