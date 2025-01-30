@extends('layouts/layBas')
@section('title', 'Admin Home')

@section('navbar')
<x-navbar-admin />
@endsection

@section('body')
<div class="mx-5">
    <form action="{{ route('saveProduct') }}" method="POST">


        @csrf
        <div class="mx-5">
            <div class="ms-5 my-5">
                <span class="text-3xl">Add Product</span>
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
                            <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter name">
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Type</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <input type="text" name="type" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter type">
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Price</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <input type="number" name="price" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter price">
                        </td>
                    </tr>
                    <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">Rate</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <input type="number" name="rating" step="0.1" max="5" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter rate">
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
            </div>
        </div>
    </form>






</div>

@endsection
