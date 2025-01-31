<link rel="stylesheet" href="{{ asset('css/AboutUs.css') }}">
<nav class="px-10 py-5">
    <ul class="flex justify-start ">
        {{--
        ctrl shift f untuk mencari sesuatu secara global
        misal disini lupa letak navLi dikelas mana, maka cari menggunakan cara tersebut
         --}}
        <li class="navLi {{ Request::is('Home') ? 'active' : '' }}"> <a href="/Home">Home</a></li>
        <li class="navLi {{ Request::is('foods') ? 'active' : '' }}"> <a href="{{ route('foodsName') }}">Foods</li>


        <li class="navLi {{ Request::is('drinks') ? 'active' : '' }}"> <a href="/drinks">Drinks</li>

        <li class="navLi {{ Request::is('apps') ? 'active' : '' }}"> <a href="/apps">Apps</li>

        <li class="navLi {{ Request::is('about') ? 'active' : '' }}">
            <a href="/about">About Us</a></li>
    </ul>
</nav>
