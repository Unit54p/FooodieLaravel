@extends('layouts/layBas')
@section('title', 'Admin Home')

@section('navbar')
<x-navbar-admin />
@endsection

@section('body')
<div>
    <div class="ms-5 my-5">
        <span class="text-3xl">product management</span>
        <button><a href="/addProduct">Add product</a></button>
    </div>

    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-left">No</th>
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
                <td class="px-4 py-2 border border-gray-300">{{ $product->ID }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $product->name }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $product->price }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $product->rating }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $product->type }}</td>
                <td class="px-4 py-2 border border-gray-300">
                    <img src="{{ $product->img }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                </td>
                <td class="px-4 py-2 border border-gray-300">
                    <!-- Action buttons, for example: -->
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




</div>

@endsection
