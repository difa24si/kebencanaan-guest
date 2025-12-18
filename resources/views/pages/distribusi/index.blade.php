@extends('layouts.guest2.app')

@section('content')
<div class="container-fluid mt-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
          <a href="{{ route('dashboard.index') }}" class="btn btn-success fw-bold">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <h4 class="fw-bold">Distribusi Logistik</h4>


        <a href="{{ route('distribusi-logistik.create') }}"
           class="btn btn-warning text-white">
            + Tambah Data
        </a>
    </div>

    {{-- CARD --}}
    <div class="card shadow-sm">
        <div class="card-body">

            {{-- FORM CARI --}}
            <form method="GET"
                  action="{{ route('distribusi-logistik.index') }}"
                  class="row g-2 mb-3">

                <div class="col-md-4">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Cari barang / penerima...">
                </div>

                <div class="col-md-3">
                    <input type="date"
                           name="tanggal"
                           value="{{ request('tanggal') }}"
                           class="form-control">
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
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Barang</th>
                            <th>Posko</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Penerima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($distribusi as $d)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $d->logistik->nama_barang ?? '-' }}</td>
                                <td>{{ $d->posko->nama_posko ?? '-' }}</td>
                                <td class="text-center">{{ $d->tanggal }}</td>
                                <td class="text-center">{{ $d->jumlah }}</td>
                                <td>{{ $d->penerima }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada data distribusi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
