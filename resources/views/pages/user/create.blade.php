@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Tambah User</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NAMA --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FOTO PROFIL --}}
                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="photo" class="form-control">
                    <small class="text-muted">Format: jpg, jpeg, png. Maks 2 MB</small>
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- TOMBOL --}}
                <button class="btn btn-primary mt-3">Simpan</button>

            </form>

        </div>
    </div>

</div>
@endsection
