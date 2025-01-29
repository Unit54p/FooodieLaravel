<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/navbar.css">

@extends('layouts/layBas')

@section('title', 'Fooodie Home')
@section('navbar')
    <x-navbar />
@endsection
@section('body')
    <main>
        <div class="heroSection ">
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
        {{-- section hero2 --}}
        <div class="contenSection  flex justify-between">
            <div class="flex align-middle justify-center flex-col gap-2">
                <span class="text-4xl">Take or Delivery</span>
                <span>You can <strong>pick it up</strong> at our place or,<br>
                    we can <strong>deliver it</strong> to your place</span>
            </div>
            <div>
                <img src="{{ asset('img/deliver.png') }}" alt="">
            </div>
        </div>
        {{-- section hero3 --}}
        <div class="contenSection flex justify-between">
            <div>
                <img src="{{ asset('img/gmaps.png') }}" alt="">
            </div>
            <div class="flex align-middle justify-center flex-col text-end gap-2">
                <span class="text-4xl">About our place</span>
                <span>South park, heliysa alika, no 99</span>
                <div class="flex justify-end ">
                    <button class="btn_primary">Google Maps</button>
                </div>
            </div>

        </div>
    </main>
@endsection
@section('footer')
    <x-footer />
@endsection
