@extends('layouts.guest2.app')

@section('title', 'Data Kejadian Bencana')

@section('content')
    <a href="{{ route('dashboard.index') }}" class="btn btn-success">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <a href="{{ route('kejadian.create') }}" class="btn btn-warning float-end">
        <i class="bi bi-plus-circle"></i> Tambah Kejadian
    </a>

    <div class="container-box mt-4 bg-light rounded shadow-sm p-4">

        <h4 class="fw-bold text-success mb-3">
         Data Kejadian Bencana
        </h4>

        <!-- Search + Filter -->
        <form method="GET" action="{{ route('kejadian.index') }}" class="row g-2 mb-4">

            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari jenis bencana / lokasi..." class="form-control">
            </div>

            <div class="col-md-3">
                <select name="jenis_bencana" class="form-control">
                    <option value="">Semua Jenis</option>
                    <option value="Banjir" {{ request('jenis_bencana') == 'Banjir' ? 'selected' : '' }}>Banjir</option>
                    <option value="Kebakaran" {{ request('jenis_bencana') == 'Kebakaran' ? 'selected' : '' }}>Kebakaran
                    </option>
                    <option value="Longsor" {{ request('jenis_bencana') == 'Longsor' ? 'selected' : '' }}>Longsor</option>
                </select>
            </div>

            <div class="col-md-3">
                <select name="status_kejadian" class="form-control">
                    <option value="">Semua Status</option>
                    <option value="Berlangsung" {{ request('status_kejadian') == 'Berlangsung' ? 'selected' : '' }}>
                        Berlangsung</option>
                    <option value="Selesai" {{ request('status_kejadian') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
            </div>

        </form>

        <div class="row">
            @foreach ($kejadian as $k)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">

                            <!-- Avatar Circle -->
                            @if ($k->media->count())
                                <img src="{{ asset('storage/' . $k->media->first()->file_name) }}"
                                    class="rounded-circle mx-auto mb-2" style="width:70px; height:70px; object-fit:cover;">
                            @else
                                <div class="rounded-circle bg-danger text-white fw-bold d-flex align-items-center justify-content-center mx-auto mb-2"
                                    style="width:70px; height:70px;">
                                    {{ strtoupper(substr($k->jenis_bencana, 0, 2)) }}
                                </div>
                            @endif

                            <h5 class="fw-bold">{{ $k->jenis_bencana }}</h5>

                            <p class="text-muted mb-1">
                                <i class="bi bi-calendar-event text-primary"></i>
                                Tanggal: {{ date('d M Y', strtotime($k->tanggal)) }}
                            </p>

                            <p class="text-muted mb-1">
                                <i class="bi bi-geo-alt text-danger"></i>
                                Lokasi: {{ $k->lokasi_text ?? 'Tidak tersedia' }}
                            </p>

                            <p class="text-muted mb-1">
                                <i class="bi bi-house-fill text-success"></i>
                                RT/RW: {{ $k->rt ?? '-' }}/{{ $k->rw ?? '-' }}
                            </p>

                            <p class="text-muted mb-2">
                                <i class="bi bi-bar-chart-fill text-warning"></i>
                                Status: <strong>{{ $k->status_kejadian }}</strong>
                            </p>

                            <a href="{{ route('kejadian.edit', $k->kejadian_id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center mt-3">
            {{ $kejadian->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
