<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/login.css">
<script src="https://unpkg.com/@tailwindcss/browser@4"></script>


@extends('layouts/layBas')
@section('title', 'Fooodie')
@section('body')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: "gagal!"
            , text: "{{ session('gagal') }}"
            , icon: "failed"
            , confirmButtonText: "Ulangi"
        });

    </script>
@endif

<body>
    <div class=" flex justify-between container_login_form">
        <div class="firstPart">
            <span class="text-5xl textFirstPart">Hello there!<br>
                Fooooooodie here</span>
        </div>
        <div class="secondPart flex justify-center">
            <div class="containerContentLogin ">

                <h3 class="text-start text-2xl mb-3">Login</h3>
                <!-- Form Login -->
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <!-- Input Email -->
                    <div class=" gap-3 flex justify-center align-middle flex-col">
                        <input type=" email" id="email" name="email" class=" inpt_field" required placeholder="Email"
                            value="{{ old('email') }}">

                        @error('email')
                            <div class="invalid-feedback textEror">{{ $message }}</div>
                        @enderror
                        <!-- Input Password -->
                        <input type="password" id="password" name="password" class="inpt_field " required
                            placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback  textEror">{{ $message }}</div>
                        @enderror
                        <!-- Tombol Submit -->
                        <div class="grid grid-cols-2 gap-4">
                            <a href="/registration" class="btn_register btn_primary text-center">
                                Register
                            </a>
                            <button type="submit" class="btn_primary">
                                Login
                            </button>

                        </div>

                    </div>
            </div>
            </form>
        </div>

    </div>

    </div>
    </div>
</body>
@endsection
