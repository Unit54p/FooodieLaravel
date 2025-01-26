<link rel="stylesheet" href="css/home.css">

@extends('layouts/layBas')

@section('title', 'Fooodie Home')
@section('navbar')
    <x-navbar />
@endsection
@section('body')
    <main>
        <div class="heroSection">
            <div class="contentHeroSection flex justify-center ">
                <div class="flex align-middle justify-center  flex-col gap-1  ">
                    <span class="text-6xl">FIND YOUR <br>FOOOOOOOOD</span>
                    <span>Your hungry is important to us! Call us and you will find :)</span>
                </div>
                <div class="flex align-middle">
                    <img src="{{ asset('img/rendang1.png') }}" alt="" class="img_hero ">
                </div>
            </div>
            <div class="sosmedNavHero p-16 flex items-center">
                <span class="">@Foodie_</span>
            </div>
        </div>
        {{-- Food section --}}
        <div class="my-8 text-center">
            <span class="text-4xl">FOOD</span>
            {{-- container --}}
            @foreach ($products as $product)

            @endforeach
            <div class="mx-4">
                {{-- Card --}}

                <div class="card  rounded-lg overflow-hidden shadow-lg">
                    {{-- Gambar --}}
                    <div>
                        <img src="{{ asset('img/rendang1.png') }}" alt="" class="card_img w-full object-cover">
                    </div>
                    {{-- Content --}}
                    <div class="cardCaption  p-4 ">
                        {{-- Judul dan Rating --}}
                        <div class="flex justify-between text-3xl">
                            <span>Rendang</span>
                            <span>⭐4</span>
                        </div>
                        {{-- Harga --}}
                        <div class="text-start text-3xl mt-2">
                            Rp. 15.000
                        </div>
                        {{-- Tombol --}}
                        <div class="mt-4">
                            <button class="btn_keranjang bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Keranjang
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </main>
@endsection
