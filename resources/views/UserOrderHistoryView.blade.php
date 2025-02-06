@extends('layouts.layBas')

@section('title', 'Fooodie Home')

@section('navbar')
<x-navbar />
@endsection

@section('body')
{{-- Mengimpor CSS --}}
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/userSetting.css') }}">

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

{{-- Konten Halaman --}}
<div class="container">
    <h1>Welcome to Fooodie Home</h1>
    <p>This is your home page where you can see your profile and orders.</p>

    {{-- Tabel Riwayat Pesanan --}}
    <h2>Order History for {{ $user->name }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Order Number</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->order_number }}</td>
                    {{-- <td>{{ $order->order_date->format('d-m-Y') }}</td> --}}
                    <td>{{ $order->order_status }}</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Tombol Aksi --}}
    <div class="actions">
        {{-- <button class="btn btn-primary" onclick="window.location.href='{{ route('editUserView') }}'">User --}}
            Settings</button>
    </div>
</div>
@endsection
