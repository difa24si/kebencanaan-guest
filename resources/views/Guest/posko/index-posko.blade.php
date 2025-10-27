<!DOCTYPE html>

<html>

<head>
    <title>Data Posko Bencana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

```
<style>
    /* 🌿🧡 Background utama: kombinasi hijau dan oranye lembut */
    body {
  background: linear-gradient(to bottom right, #6dd34d, #f6a31b);
  height: 100vh;
  margin: 0;
}
    /* Card utama */
    .container {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        padding: 35px 45px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(255, 152, 0, 0.25);
        margin-top: 60px;
        margin-bottom: 60px;
        border: 2px solid #ffcc80;
    }

    h2 {
        background: linear-gradient(90deg, #43a047, #fb8c00);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;
        margin-bottom: 25px;
        text-align: center;
        text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.4);
    }

    /* Tombol */
    .btn {
        transition: all 0.3s ease-in-out;
        border-radius: 8px;
        font-weight: 500;
        box-shadow: 0 3px 6px rgba(46, 125, 50, 0.3);
    }

    .btn-primary {
        background: linear-gradient(90deg, #43a047, #fb8c00);
        border: none;
        color: #fff;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #2e7d32, #f57c00);
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.4);
        color: #fff;
    }

    .btn-warning {
        background: linear-gradient(90deg, #ffa726, #fdd835);
        color: #fff;
        border: none;
    }

    .btn-warning:hover {
        background: linear-gradient(90deg, #fb8c00, #fbc02d);
        color: #fff;
        transform: scale(1.05);
    }

    .btn-danger {
        background: linear-gradient(90deg, #ef5350, #e64a19);
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        background: linear-gradient(90deg, #d84315, #c62828);
        transform: scale(1.05);
    }

    /* 🌾 Tabel */
    table {
        background-color: #ffffff;
        border: 2px solid #c8e6c9;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 12px rgba(255, 152, 0, 0.15);
    }

    thead {
        background: linear-gradient(90deg, #43a047, #fb8c00);
        color: white;
        text-align: center;
        font-weight: 600;
    }

    tbody tr:nth-child(even) {
        background-color: #f1f8e9;
    }

    tbody tr:nth-child(odd) {
        background-color: #fff8e1;
    }

    tbody tr:hover {
        background-color: #fff3e0;
        transition: background-color 0.3s ease;
    }

    tbody td {
        vertical-align: middle;
    }

    img {
        border-radius: 8px;
        border: 2px solid #ffcc80;
        transition: transform 0.2s ease;
    }

    img:hover {
        transform: scale(1.1);
    }

    /* 🌸 Alert sukses */
    .alert-success {
        background-color: #f1f8e9;
        border-color: #aed581;
        color: #33691e;
        font-weight: 500;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(255, 152, 0, 0.25);
    }
</style>
```

</head>

<body>

```
<div class="container mt-4">
    <h2>Data Posko Bencana</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('dashboard.index') }}" class="btn btn-primary mb-3">⬅️ Kembali</a>
    <a href="{{ route('posko.create') }}" class="btn btn-primary mb-3">➕ Tambah Posko</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Penanggung Jawab</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posko as $p)
                <tr>
                    <td>{{ $p->posko_id }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->kontak }}</td>
                    <td>{{ $p->penanggung_jawab }}</td>
                    <td>
                        @if ($p->foto)
                            <img src="{{ asset('storage/' . $p->foto) }}" width="80">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
```

</body>

</html>
