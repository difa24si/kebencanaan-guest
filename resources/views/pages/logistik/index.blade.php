@extends('layouts.guest2.app')

@section('content')
<div class="container-fluid p-0">

    {{-- HEADER HIJAU --}}
    <div class="px-4 py-3"
         style="background: linear-gradient(90deg, #6fbf44, #b7c33a);">

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('dashboard.index') }}"
               class="btn btn-success fw-bold">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>

            <h3 class="fw-bold text-dark mb-0">
                Logistik Bencana
            </h3>

            <a href="{{ route('logistik.create') }}"
               class="btn btn-warning text-white fw-bold">
                + Tambah Data
            </a>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="container mt-4">

        {{-- CARD PUTIH --}}
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">

                {{-- FORM CARI --}}
                <form method="GET"
                      action="{{ route('logistik.index') }}"
                      class="row g-3 mb-4 align-items-center">

                    <div class="col-md-4">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control form-control-lg"
                               placeholder="Cari nama barang / sumber...">
                    </div>

                    <div class="col-md-3">
                        <select name="kejadian_id"
                                class="form-control form-control-lg">
                            <option value="">Semua Kejadian</option>
                            @foreach($kejadian as $k)
                                <option value="{{ $k->id }}"
                                    {{ request('kejadian_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_bencana }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-success w-100">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>

                {{-- ALERT --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- TABEL --}}
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kejadian</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Sumber</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logistik as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kejadian->jenis_bencana ?? '-' }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $item->stok }}
                                        </span>
                                    </td>
                                    <td>{{ $item->sumber }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted py-4">
                                        Belum ada data logistik
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>


</div>
@endsection
