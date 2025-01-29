<link rel="stylesheet" href="{{ asset('css/AboutUs.css') }}">
<nav class="px-10 py-5">
    <ul class="flex justify-start gap-3">
        <li class="navLi {{ Request::is('Home') ? 'active' : '' }}"> <a href="/Home">Home</a></li>
        <li class="navLi {{ Request::is('foods') ? 'active' : '' }}"> <a href="/foods">Foods</li>

        <li class="navLi {{ Request::is('drinks') ? 'active' : '' }}"> <a href="/drinks">Drinks</li>

        <li class="navLi {{ Request::is('apps') ? 'active' : '' }}"> <a href="/apps">Apps</li>

        <li class="navLi {{ Request::is('about') ? 'active' : '' }}">
            <a href="/about">About Us</a></li>
    </ul>
</nav>
