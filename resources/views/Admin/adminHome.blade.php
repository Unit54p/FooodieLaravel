@extends('layouts/layBas')
@section('title', 'Admin Home')

@section('navbar')
<x-navbar-admin />
@endsection

@section('body')
<main>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
    <div
        class="card_dashboard bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg rounded-2xl p-6 flex flex-col items-center justify-center hover:scale-105 transition transform duration-300">
        <h2 class="text-xl font-semibold">Total Users</h2>
        <p class="text-4xl font-bold mt-2">{{ $userCounts }}</p>
    </div>

    <div
        class="card_dashboard bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg rounded-2xl p-6 flex flex-col items-center justify-center hover:scale-105 transition transform duration-300">
        <h2 class="text-xl font-semibold">Total Foods</h2>
        <p class="text-4xl font-bold mt-2">{{ $foodsCounts }}</p>
    </div>

    <div
        class="card_dashboard bg-gradient-to-r from-red-500 to-rose-600 text-white shadow-lg rounded-2xl p-6 flex flex-col items-center justify-center hover:scale-105 transition transform duration-300">
        <h2 class="text-xl font-semibold">Total Drinks</h2>
        <p class="text-4xl font-bold mt-2">{{ $drinksCounts }}</p>
    </div>
</div>

</main>
@endsection
