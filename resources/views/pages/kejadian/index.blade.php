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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold text-success">
                <i class="bi bi-exclamation-triangle-fill"></i> Data Kejadian Bencana
            </h4>
        </div>

        <div class="row">
            @foreach ($kejadian as $k)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">

                            <div class="rounded-circle bg-danger text-white fw-bold d-flex align-items-center justify-content-center mx-auto mb-2"
                                 style="width:70px; height:70px;">
                                {{ strtoupper(substr($k->jenis_bencana, 0, 2)) }}
                            </div>

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
    </div>
@endsection
