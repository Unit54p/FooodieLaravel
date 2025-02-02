<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/userSetting.css">
@extends('layouts/layBas')

@section('title', 'Fooodie Home')
@section('navbar')
<x-navbar />
@endsection
@section('body')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
@endif
<form action="{{ route('SaveUserSetting', $user->id) }}" enctype="multipart/form-data" method="POST" class="mt-12">
    @csrf

    @method('PUT')

    <div class="grid grid-cols-2">
        {{-- page 1 --}}
        <div class="flex justify-center ">
            <div class="w-70 ">
                <img src="{{ old('img', $user->imgProfile) }}" alt="" class="mb-3">
                <div class="file-input-container">
                    <label for="file-upload" class="inputField" style="cursor: pointer">
                        Ganti Foto
                    </label>
                    <input type="file" id="file-upload" name="image" class=" hidden" />

                </div>
            </div>

        </div>
        {{-- page 2 --}}
        <div class="flex justify-center flex-col gap-5 w-120">
            <div class="form-group">
                <label for="name">Nama</label><br>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    class="form-control inputField" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="inputField"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Password Baru (Opsional)</label><br>
                <input type="password" id="password" name="password" class="inputField"">
            </div>

            <div class=" form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="inputField">
            </div>



            <button type="submit" class=" btn_primary">Perbarui Profil</button>
        </div>
    </div>
</form>
@endsection
