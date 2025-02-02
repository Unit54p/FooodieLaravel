<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/home.css">

@extends('layouts/layBas')
@section('title', 'Fooodie About Us')

@section('navbar')
<x-navbar />
@endsection

@section('body')

<div class=" ">
    <div class="text-center text-4xl my-8">FOOD</div>
    {{-- container --}}
    <div class="mx-4 flex justify-center">
        {{-- Card --}}
        <div class=" grid grid-cols-4 ">
            @foreach ($foodProducts as $product)
                <div class="card mx-5 rounded-lg overflow-hidden shadow-lg mb-6">
                    {{-- Gambar --}}
                    <div>
                        <img src="{{ asset($product->img) }}" alt="" class="card_img w-full object-cover">
                    </div>
                    {{-- Content --}}
                    <div class="cardCaption p-4 ">
                        {{-- Judul dan Rating --}}
                        <div class="flex items-center text-3xl">
                            <span class="flex-[4]">{{ $product->name }}</span>
                            <span class="flex-[1] text-xl">⭐{{ $product->rating }}</span>
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
</div>


@endsection

@section('footer')
<x-footer />

@endsection
