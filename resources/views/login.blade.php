<link rel="stylesheet" href="css/home.css">
@extends('layouts/layBas')
@section('title', 'Fooodie')
@section('body')

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h3 class="text-center">Login</h3>
                    <!-- Form Login -->
                    <form action="{{ route('login.process') }}" method="POST">
                        <!--
            CSRF (Cross-Site Request Forgery) adalah jenis serangan di mana penyerang dapat memaksa pengguna yang sudah terautentikasi
            untuk melakukan tindakan yang tidak diinginkan tanpa sepengetahuan mereka, seperti mengirimkan formulir atau mengubah data
            pada aplikasi web.

            Sebagai contoh, jika pengguna sudah login ke aplikasi kamu, penyerang bisa menyisipkan kode berbahaya di situs lain yang
            mengarahkan pengguna untuk mengirimkan permintaan ke aplikasi kamu, dan server tidak dapat membedakan apakah permintaan
            tersebut berasal dari pengguna yang sah atau penyerang.

            Untuk mencegah serangan CSRF, Laravel secara otomatis melindungi setiap form yang mengirimkan data POST dengan token CSRF.
            Token CSRF adalah sebuah nilai unik yang dimasukkan dalam form dan divalidasi oleh server setiap kali form disubmit.
            Ini memastikan bahwa hanya permintaan yang berasal dari aplikasi kita yang diterima dan diproses oleh server.

            Fungsi `@csrf` dalam Laravel akan secara otomatis menambahkan token CSRF ke dalam form, dan Laravel akan memeriksa token
            ini setiap kali menerima request POST untuk memastikan bahwa permintaan tersebut sah dan bukan hasil dari serangan.

            Tanpa perlindungan ini, aplikasi kita bisa rentan terhadap CSRF, yang dapat mengekspos data pengguna atau menyebabkan
            tindakan yang tidak sah tanpa izin mereka.

            Jadi, selalu gunakan `@csrf` di dalam form Laravel untuk mencegah serangan CSRF dan memastikan keamanan aplikasi kamu.
        -->
                        @csrf

                        <!-- Input Email -->
                        <div class="mb-3">
                            <!-- Label untuk input email -->
                            <label for="email" class="form-label">Email</label>
                            <!-- Input field untuk email -->
                            <!--
                        - type="email": memastikan bahwa input hanya menerima input dengan format email yang valid.
                        - id="email": digunakan untuk label dan juga selector CSS.
                        - name="email": nama atribut yang akan dikirim bersama form (digunakan untuk mengakses data di controller).
                        - class="form-control": menambahkan class CSS dari Bootstrap untuk styling input field.
                        - required: membuat input ini wajib diisi.
                        - autofocus: menandakan bahwa input ini otomatis akan mendapatkan fokus saat halaman dimuat.
                    -->
                            <input type="email" id="email" name="email" class="form-control" required autofocus>
                        </div>

                        <!-- Input Password -->
                        <div class="mb-3">
                            <!-- Label untuk input password -->
                            <label for="password" class="form-label">Password</label>
                            <!-- Input field untuk password -->
                            <!--
                        - type="password": memastikan bahwa karakter yang diketikkan disembunyikan (menggunakan simbol titik atau bintang).
                        - id="password": digunakan untuk label dan juga selector CSS.
                        - name="password": nama atribut yang akan dikirim bersama form (digunakan untuk mengakses data di controller).
                        - class="form-control": menambahkan class CSS dari Bootstrap untuk styling input field.
                        - required: membuat input ini wajib diisi.
                    -->
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </body>
@endsection
