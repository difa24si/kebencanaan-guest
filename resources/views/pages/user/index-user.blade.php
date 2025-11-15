@extends('layouts.guest2.app')

@section('title', 'Data User')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-success fw-bold mb-4">Data User</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('dashboard.index') }}" class="btn btn-success">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('user.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        @forelse ($users as $item)
            <div class="col-md-4 col-lg-3">
                <div class="card text-center shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=198754&color=fff"
                             alt="{{ $item->name }}" class="rounded-circle mb-3" width="90" height="90">
                        <h6 class="fw-semibold text-success">{{ $item->name }}</h6>
                        <p class="text-muted small mb-3">{{ $item->email }}</p>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('user.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                Belum ada data user.
            </div>
        @endforelse
    </div>
</div>
@endsection
