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
        <div class=" ">
            <div class="text-center text-4xl my-8">FOOD</div>
            {{-- container --}}
            <div class="mx-4 flex justify-center">
                {{-- Card --}}
                @foreach ($foodProducts as $product)
                    <div class="card mx-5 rounded-lg overflow-hidden shadow-lg">
                        {{-- Gambar --}}
                        <div>
                            <img src="{{ asset($product->img) }}" alt="" class="card_img w-full object-cover">
                        </div>
                        {{-- Content --}}
                        <div class="cardCaption p-4 ">
                            {{-- Judul dan Rating --}}
                            <div class="flex justify-between text-3xl">
                                <span>{{ $product->name }}</span>
                                <span>⭐{{ $product->rating }}</span>
                            </div>
                            {{-- Harga --}}
                            <div class="text-start text-3xl mt-2">
                                Rp. {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            {{-- Tombol --}}
                            <div class="mt-4">
                                <button class="btn_keranjang bg-blue-500 text-white px-4 py-2 rounded text-xl">
                                    Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        {{-- Drink section --}}
        <div class=" ">
            <div class="text-center text-4xl my-8">DRINK</div>
            {{-- container --}}
            <div class="mx-4 flex justify-center">
                {{-- Card --}}
                @foreach ($drinkProducts as $product)
                    <div class="card mx-5 rounded-lg overflow-hidden shadow-lg">
                        {{-- Gambar --}}
                        <div>
                            <img src="{{ asset($product->img) }}" alt="" class="card_img w-full object-cover">
                        </div>
                        {{-- Content --}}
                        <div class="cardCaption p-4 ">
                            {{-- Judul dan Rating --}}
                            <div class="flex justify-between text-3xl">
                                <span>{{ $product->name }}</span>
                                <span>⭐{{ $product->rating }}</span>
                            </div>
                            {{-- Harga --}}
                            <div class="text-start text-3xl mt-2">
                                Rp. {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            {{-- Tombol --}}
                            <div class="mt-4">
                                <button class="btn_keranjang bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </main>
@endsection
