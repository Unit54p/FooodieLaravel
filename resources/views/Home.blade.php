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
    </main>
@endsection
