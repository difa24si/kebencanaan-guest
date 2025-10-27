<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

```
<style>
   body {
  background: linear-gradient(to bottom right, #6dd34d, #f6a31b);
  height: 100vh;
  margin: 0;
}

    h2 {
        text-align: center;
        color: #2e7d32;
        margin-top: 25px;
        font-weight: bold;
    }

    .btn-success { background-color: #2e7d32; border-color: #2e7d32; }
    .btn-success:hover { background-color: #1b5e20; }
    .btn-warning { background-color: #ffb300; border-color: #ffb300; color: #fff; }
    .btn-danger { background-color: #d32f2f; border-color: #d32f2f; }

    .alert {
        border-radius: 10px;
    }

    .user-card {
        border-radius: 15px;
        background: #fff;
        padding: 25px 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        text-align: center;
    }

    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.2);
    }

    .avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #2e7d32;
    }

    .user-name {
        font-weight: 600;
        font-size: 1.1rem;
        color: #2e7d32;
        margin-top: 10px;
    }

    .user-email {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 15px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .btn {
        font-size: 0.9rem;
        border-radius: 20px;
        padding: 6px 14px;
    }
</style>
```

</head>

<body>

<div class="container mt-4">
    <h2>Data User</h2>

```
<div class="d-flex justify-content-between mb-3">
    <a href="{{ route('dashboard.index') }}" class="btn btn-success">← Kembali</a>
    <a href="{{ route('user.create') }}" class="btn btn-success">+ Tambah User</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row g-4">
    @forelse ($users as $item)
        <div class="col-md-4 col-lg-3">
            <div class="user-card">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=2e7d32&color=fff"
                     alt="{{ $item->name }}" class="avatar mb-3">
                <div class="user-name">{{ $item->name }}</div>
                <div class="user-email">{{ $item->email }}</div>

                <div class="action-buttons">
                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center text-muted py-5">
            Belum ada data user.
        </div>
    @endforelse
</div>
```

</div>

</body>
</html>
