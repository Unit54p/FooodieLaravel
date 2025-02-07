<link rel="stylesheet" href="{{ asset('css/basic.css') }}">



@extends('layouts/layBas')
@section('title', 'Admin Home')

@section('navbar')
<x-navbar-admin />
@endsection

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

<div class="mx-6">
    <div class=" my-6 flex justify-between">
        <span class="text-3xl">product management</span>
        <a href="/addProduct" class="btn_primary">Add product</a>
    </div>

    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="text-center border border-gray-300 ">No</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Name</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Price</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Rate</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Type</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Image</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                    <td class="text-center border border-gray-300">{{ $product->ID }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $product->name }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $product->price }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $product->rating }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $product->type }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <img src="{{ Storage::url($product->img) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        <!-- Action buttons, for example: -->
                        <a href="{{ route('editProduct',$product->ID) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                        {{-- <form action="{{ route('products.destroy', $product->ID) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form> --}}
                        <a href="{{ route('hapusproduk', $product->ID) }}" class="bg-red-500 text-white px-4 py-2 rounded"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            Hapus
                        </a>



                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




</div>

@endsection
