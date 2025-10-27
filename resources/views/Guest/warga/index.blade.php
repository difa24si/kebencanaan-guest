<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>

```
{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Custom CSS --}}
<style>
    body {
        background: linear-gradient(135deg, #ffb347, #ffcc33, #a8e063);
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        animation: fadeIn 0.7s ease;
    }

    .card-header {
        background: linear-gradient(90deg, #27ae60, #f39c12);
        color: #fff;
        text-align: center;
        font-weight: 600;
    }

    .warga-card {
        border-radius: 15px;
        background: #fff;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .warga-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
    }

    .avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #27ae60;
    }

    .warga-info h5 {
        font-weight: 600;
        color: #333;
    }

    .badge {
        background: #27ae60;
    }

    .btn-warning {
        background-color: #f39c12;
        border: none;
        color: #fff;
    }

    .alert {
        border-radius: 10px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
```

</head>

<body>

```
<div class="container py-5">
    <a href="{{ route('dashboard.index') }}" class="btn btn-warning text-white fw-bold mb-4">
        ⬅️ Kembali
    </a>

    <div class="card shadow-lg border-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">📋 Data Warga</h3>
            <a href="{{ route('warga.create') }}" class="btn btn-warning text-white fw-bold">
                ➕ Tambah Data
            </a>
        </div>

        <div class="card-body bg-light">
            {{-- Flash Message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    ❌ {{ session('error') }}
                </div>
            @endif

            {{-- Ganti tabel menjadi list card --}}
            <div class="row g-4">
                @forelse ($warga as $item)
                    <div class="col-md-4 col-lg-3">
                        <div class="warga-card text-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=27ae60&color=fff"
                                alt="{{ $item->nama }}" class="avatar mb-3">
                            <div class="warga-info">
                                <h5>{{ $item->nama }}</h5>
                                <p class="text-muted mb-1">{{ $item->pekerjaan }}</p>
                                <span class="badge">{{ $item->agama }}</span>
                            </div>
                            <div class="mt-3 small text-secondary">
                                <p><strong>Gender:</strong> {{ $item->gender }}</p>
                                <p><strong>Telp:</strong> {{ $item->phone }}</p>
                                <p><strong>Email:</strong> {{ $item->email }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">
                        Belum ada data warga.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
```

</body>

</html>
