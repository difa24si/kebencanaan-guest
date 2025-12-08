@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Edit User</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- NAMA --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- PREVIEW FOTO --}}
                <div class="mb-3">
                    <label class="form-label d-block">Foto Profil Saat Ini</label>

                    @if ($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}"
                             width="120" class="rounded mb-2 border">
                    @else
                        <img src="{{ asset('assets/img/placeholder.png') }}"
                             width="120" class="rounded mb-2 border">
                    @endif
                </div>

                {{-- UPLOAD FOTO BARU --}}
                <div class="mb-3">
                    <label class="form-label">Ganti Foto Profil</label>
                    <input type="file" name="photo" class="form-control">
                    <small class="text-muted">Abaikan jika tidak ingin mengganti foto</small>
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- TOMBOL --}}
                <button class="btn btn-success mt-3">Update</button>

            </form>

        </div>
    </div>

</div>
@endsection
