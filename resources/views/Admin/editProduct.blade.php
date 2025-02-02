@extends('layouts/layBas')
@section('title', 'Edit Product')

@section('navbar')
<x-navbar-admin />
@endsection

@section('body')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<div class="mx-5">
    <form action="{{ route('saveEditProduct', $product->ID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mx-5">
            <div class="ms-5 my-5">
                <span class="text-3xl">Edit Product</span>
            </div>

            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border border-gray-300 text-left">Field</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Input</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Name</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <input type="text" name="name" value="{{ $product->name }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Type</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <select name="type"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="food" {{ $product->type == 'food' ? 'selected' : '' }}>Food</option>
                                <option value="drink" {{ $product->type == 'drink' ? 'selected' : '' }}>Drink</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Price</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <input type="number" name="price" value="{{ $product->price }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Rate</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <input type="number" name="rating" value="{{ $product->rating }}" step="0.1" max="5"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </td>
                    </tr>

                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Upload Image</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <input type="file" name="image"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-end mt-4">
                <button type="submit" class="btn_primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
