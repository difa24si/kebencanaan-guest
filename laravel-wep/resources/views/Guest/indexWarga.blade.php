<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Warga - Dashboard Posko</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <!-- ✅ Menu Warga -->
                <li class="nav-item active">
                    <a href="{{ route('warga.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479
                                    3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0
                                    .225-.012.447-.037.666A11.944 11.944 0 0 1
                                    12 21c-2.17 0-4.207-.576-5.963-1.584A6.062
                                    6.062 0 0 1 6 18.719m12 0a5.971 5.971
                                    0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0
                                    12 12.75a5.995 5.995 0 0 0-5.058
                                    2.772m0 0a3 3 0 0 0-4.681 2.72
                                    8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971
                                    5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1
                                    1-6 0 3 3 0 0 1 6 0Zm6 3a2.25
                                    2.25 0 1 1-4.5 0 2.25 2.25 0 0
                                    1 4.5 0Zm-13.5 0a2.25 2.25 0 1
                                    1-4.5 0 2.25 2.25 0 0 1 4.5 0Z">
                                </path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Data Warga</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <div class="py-4">
            <div class="d-flex justify-content-between flex-wrap">
                <div>
                    <h1 class="h4">Data Warga</h1>
                    <p>List seluruh data warga binaan</p>
                </div>
                <div>
                    <a href="{{ route('warga.create') }}" class="btn btn-success text-white">
                        Tambah Warga
                    </a>
                </div>
            </div>
        </div>

        <!-- ✅ Table Data Warga -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataWarga as $w)
                                <tr>
                                    <td>{{ $w->first_name }} {{ $w->last_name }}</td>
                                    <td>{{ $w->gender }}</td>
                                    <td>{{ $w->agama }}</td>
                                    <td>{{ $w->pekerjaan }}</td>
                                    <td>{{ $w->telepon }}</td>
                                    <td>{{ $w->email }}</td>
                                    <td>
                                        <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ✅ Form Tambah Warga -->
        <div class="card border-0 shadow p-4">
            <h5 class="mb-3">Tambah Data Warga</h5>
            <form action="{{ route('warga.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nama Depan</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Nama Belakang</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="birthday" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>No. Telepon</label>
                        <input type="text" name="telepon" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

        <footer class="bg-white rounded shadow p-4 mt-5 text-center">
            <p class="mb-0 text-gray-600">© {{ date('Y') }} Dashboard Posko Warga</p>
        </footer>
    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
