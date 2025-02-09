<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/home.css">
@extends('layouts/layBas')
@section('title', 'Fooodie About Us')

@section('navbar')
<x-navbar />
@endsection

@section('body')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl text-center mb-5">Keranjang Belanja</h1>

    <table class="w-full border-collapse border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Produk</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
                <tr>
                    <td class="border p-2">{{ $item->product->name }}</td>
                    <td class="border p-2">Rp. {{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td class="border p-2 flex justify-between ">
                        <button class="btn_mini">+</button>
                        {{ $item->quantity }}
                        <button class="btn_mini">-</button>
                    </td>
                    <td class="border p-2">Rp. {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                    </td>
                    <td class="border p-2">
                        {{-- <form action="{{ route('removeFromCart', ['products_id' => $item->products_id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('footer')
{{-- <x-footer /> --}}
@endsection
