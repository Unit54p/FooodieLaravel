<link rel="stylesheet" href="{{ asset('css/AboutUs.css') }}">
<nav class="px-10 py-5">
    <ul class="flex justify-start gap-8">
        <li class="navLi {{ Request::is('Home') ? 'active' : '' }}"> <a href="/Home">Home</a></li>
        <li class="navLi">Foods</li>
        <li class="navLi">Drinks</li>
        <li class="navLi">Apps</li>
        <li class="navLi {{ Request::is('about') ? 'active' : '' }}">
            <a href="/about">About Us</a></li>
    </ul>
</nav>
