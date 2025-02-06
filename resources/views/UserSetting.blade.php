<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/userSetting.css">
@extends('layouts/layBas')

@section('title', 'Fooodie Home')
@section('navbar')
<x-navbar />
@endsection
@section('body')

{{-- SweetAlert2 Script --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Menampilkan SweetAlert2 jika ada session sukses --}}
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

{{-- Menampilkan SweetAlert2 jika ada error --}}
@if($errors->any())
    <script>
        let errorMessages = "";
        @foreach ($errors->all() as $error)
            errorMessages += "{{ $error }}\n";
        @endforeach

        Swal.fire({
            title: "Error!",
            text: errorMessages,
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
@endif


<form action="{{ route('SaveUserSetting', $user->id) }}" enctype="multipart/form-data" method="POST" class="mt-12">
    @csrf

    @method('PUT')

    <div class="grid grid-cols-2">
        {{-- halaman 1 --}}
        <div class="flex justify-center">
            <div class="w-70">
                <img src="{{ Storage::url($user->imgProfile) }}" alt="" class="mb-3">
                <div class="file-input-container">
                    <label for="image">Change Photo</label><br>
                    <input type="file" name="image"
                        class="file:mr-4 file:rounded-full file:border-0 file:bg-violet-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-violet-700 hover:file:bg-violet-100 dark:file:bg-violet-600 dark:file:text-violet-100 dark:hover:file:bg-violet-500 ..." />
                </div>
                <div>
                    <button type="button" class="btn_primary"
                        onclick="window.location.href='{{ route('userOrderHistoryView', ['id' => $user->id]) }}'">
                        History
                    </button>
                </div>
            </div>
        </div>

        {{-- halaman 2 --}}
        <div class="flex justify-center flex-col gap-5 w-120">
            <div class="form-group">
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    class="form-control inputField" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="inputField"
                    required>
            </div>

            <div class="form-group">
                <label for="password">New Password (Optional)</label><br>
                <input type="password" id="password" name="password" class="inputField">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="inputField">
            </div>

            <button type="submit" class="btn_primary">Update Profile</button>
        </div>
    </div>
</form>

@endsection
