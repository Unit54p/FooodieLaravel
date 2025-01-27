<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/login.css">
@extends('layouts/layBas')
@section('title', 'Fooodie')
@section('body')

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
                    <div class=" gap-3 flex justify-center align-middle flex-col ">

                        <!-- Label untuk input email -->
                        <input type=" email" id="email" name="email" class=" inpt_field" required placeholder="Email">

                        <!-- Input Password -->
                        <!-- Label untuk input password -->
                        <input type="password" id="password" name="password" class=" inpt_field" required placeholder="Password">
                        <!-- Tombol Submit -->
                        <button type="submit" class="btn_primary">

                            Login
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
@endsection
