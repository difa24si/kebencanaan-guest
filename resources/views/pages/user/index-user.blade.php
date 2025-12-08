@extends('layouts.guest2.app')

@section('title', 'Data User')

@section('content')
<div id="carouselIndonesia" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="https://i.ibb.co/xFD7VvX/indonesia-komodo.jpg" class="d-block w-100"
                 style="height: 380px; object-fit: cover;" alt="Komodo Indonesia">
            <div class="carousel-caption bg-dark bg-opacity-50 rounded p-2">
                <h5>Pulau Komodo – NTT</h5>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="https://i.ibb.co/6P24h7F/borobudur.jpg" class="d-block w-100"
                 style="height: 380px; object-fit: cover;" alt="Candi Borobudur">
            <div class="carousel-caption bg-dark bg-opacity-50 rounded p-2">
                <h5>Candi Borobudur – Magelang</h5>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="https://i.ibb.co/r3wypHv/raja-ampat.jpg" class="d-block w-100"
                 style="height: 380px; object-fit: cover;" alt="Raja Ampat">
            <div class="carousel-caption bg-dark bg-opacity-50 rounded p-2">
                <h5>Raja Ampat – Papua Barat</h5>
            </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item">
            <img src="https://i.ibb.co/93pFdcL/bromo.jpg" class="d-block w-100"
                 style="height: 380px; object-fit: cover;" alt="Gunung Bromo">
            <div class="carousel-caption bg-dark bg-opacity-50 rounded p-2">
                <h5>Gunung Bromo – Jawa Timur</h5>
            </div>
        </div>

    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndonesia" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselIndonesia" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

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

        <!-- Search & Filter -->
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-body">

                <form method="GET" action="{{ route('user.index') }}" class="row g-2">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                            placeholder="Cari nama atau email...">
                    </div>

                    <div class="col-md-3">
                        <select name="role" class="form-control">
                            <option value="">Semua Role</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Filter
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary w-100">
                            Reset
                        </a>
                    </div>

                </form>

            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse ($users as $item)
                <div class="col-md-4 col-lg-3">
                    <div class="card text-center shadow-sm border-0 rounded-4">
                        <div class="card-body">

                            {{-- FOTO PROFIL --}}
                            @if ($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}"
                                     class="rounded-circle mb-3"
                                     width="90" height="90"
                                     style="object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/placeholder.png') }}"
                                     class="rounded-circle mb-3"
                                     width="90" height="90"
                                     style="object-fit: cover;">
                            @endif

                            <h6 class="fw-semibold text-success">{{ $item->name }}</h6>
                            <p class="text-muted small mb-1">{{ $item->email }}</p>

                            <!-- ROLE -->
                            <span class="badge bg-success mb-3">{{ ucfirst($item->role) }}</span>

                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-5">Belum ada data user.</div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
