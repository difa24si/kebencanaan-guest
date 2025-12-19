@extends('layouts.guest2.app')

@section('title', isset($user) ? 'Edit Data User' : 'Tambah User Baru')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('user.index') }}" class="btn btn-success mb-3">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>

        <div class="bg-light rounded shadow-sm p-4">
            <h2 class="text-center text-success fw-bold mb-4">
                <i class="bi bi-person-fill"></i>
                {{ isset($user) ? 'Edit Data User' : 'Tambah User Baru' }}
            </h2>

            <form method="POST" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" enctype="multipart/form-data">
                @csrf
                @if (isset($user))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="fw-semibold text-success">
                        <i class="bi bi-person-badge"></i> Nama Lengkap
                    </label>
                    <input type="text" name="name" class="form-control border-success-subtle"
                        value="{{ old('name', $user->name ?? '') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-semibold text-success">
                        <i class="bi bi-envelope-fill"></i> Email
                    </label>
                    <input type="email" name="email" class="form-control border-success-subtle"
                        value="{{ old('email', $user->email ?? '') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-semibold text-success">
                        <i class="bi bi-person-gear"></i> Role
                    </label>
                    <select name="role" class="form-control border-success-subtle" required>
                        <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin
                        </option>
                        <option value="user" {{ old('role', $user->role ?? '') == 'user' ? 'selected' : '' }}>User
                        </option>
                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-semibold text-success">
                        <i class="bi bi-lock-fill"></i> Password
                    </label>
                    <input type="password" name="password" class="form-control border-success-subtle"
                        {{ isset($user) ? '' : 'required' }}>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="fw-semibold text-success">
                        <i class="bi bi-shield-lock"></i> Verifikasi Password
                    </label>
                    <input type="password" name="password_confirmation" class="form-control border-success-subtle"
                        {{ isset($user) ? '' : 'required' }}>
                </div>

                {{-- FOTO PROFIL --}}
                <div class="mb-3">
                    <label class="fw-semibold text-success">
                        Foto Profil
                    </label>

                    @if (isset($user) && $user->photo())
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $user->photo()->file_name) }}" width="100"
                                class="rounded-circle border">
                        </div>
                    @endif

                    <input type="file" name="photo" class="form-control">
                    <small class="text-muted">jpg / png (max 2MB)</small>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save2-fill"></i> Simpan
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-warning text-white">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
