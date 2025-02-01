<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/UserRegistration.css">
<script src="https://unpkg.com/@tailwindcss/browser@4"></script>


@extends('layouts/layBas')
@section('title', 'Fooodie')
@section('body')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: "Success!"
            , text: "{{ session('success') }}"
            , icon: "success"
            , confirmButtonText: "OK"
        });

    </script>
@endif
{{-- pengecekan email --}}
@if ($errors->any())
    <script>
        Swal.fire({
            title: "Error!",
            text: "{{ $errors->first() }}",
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
@endif

<body>
    <div class=" flex justify-between container_login_form">
        <div class="firstPart registrationFirstPart">
            <span class="text-5xl textFirstPart ">Registration<br>
                Carefull with your data</span>
        </div>
        {{-- second part --}}

        <div class="secondPart flex justify-center">
            <div class="containerContentLogin ">
                <h3 class="text-start text-2xl mb-3">Registration</h3>
                <!-- Form Login -->
                <form action="{{ route('saveRegistration') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input Email -->
                    <div class=" gap-3 flex justify-center align-middle flex-col">
                        <input type=" text" id="username" name="username" class=" inpt_field" required
                            placeholder="username">
                        <input type=" email" id="email" name="email" class=" inpt_field" required placeholder="Email">
                        <!-- Input Password -->
                        <input type="password" id="password" name="password" class="inpt_field " required
                            placeholder="Password">
                        <!-- Tombol Submit -->
                        <label for="fotoProfile">Profile picture</label>
                        <input type="file" name="imageProfile" id="fotoProfile"
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('login') }}" class="btn_register btn_primary text-center">Login</a>
                            <button type="submit" class="btn_primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
