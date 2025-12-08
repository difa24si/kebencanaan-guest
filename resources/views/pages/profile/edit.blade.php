<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <style>
        .profile-box {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #2ecc71;
            margin-bottom: 10px;
        }
        .profile-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

</head>
<body>

    <h1>Edit Profile</h1>

    {{-- FOTO SAAT INI --}}
    <div class="profile-box">
        @if($user->profile_picture)
            <img src="{{ Storage::url($user->profile_picture) }}" id="preview">
        @else
            <img src="{{ asset('assets/img/profile.png') }}" id="preview">
        @endif
    </div>

    {{-- HAPUS FOTO --}}
    @if($user->profile_picture)
        <form action="{{ route('profile.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus Foto</button>
        </form>
    @endif

    <br>

    {{-- FORM UPDATE FOTO --}}
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="profile_picture">Pilih Foto Baru:</label>
        <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
        <br><br>

        <button type="submit">Update Profile</button>
    </form>

    <br>
    <a href="{{ route('profile.show') }}">Kembali ke Profile</a>

    {{-- PREVIEW FOTO OTOMATIS --}}
    <script>
        document.getElementById('profile_picture').onchange = function (event) {
            let img = document.getElementById('preview');
            img.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

</body>
</html>
