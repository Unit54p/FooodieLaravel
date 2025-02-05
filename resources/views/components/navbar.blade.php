<link rel="stylesheet" href="{{ asset('css/AboutUs.css') }}">
<nav class="px-10 py-5  flex justify-between align-middle ">
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
            <a href="/about">About Us</a>
        </li>
    </ul>
    @auth
        <div class="flex flex-row userProfile gap-4">
            {{-- <a href="{{ route('editUserView', Auth::user()->id) }}" class="navLi">Welcome, {{ Auth::user()->name }}</a>
            --}}
            <img src="{{ asset('img/cart.svg') }}" alt="" style="width: 55%" class="hover:cursor-pointer hover:scale-110 ">
            <button onclick="window.location='{{ route('editUserView', ['id' => Auth::user()->id]) }}'" class="img-btn">
                <img src="{{ Storage::url(Auth::user()->imgProfile) }}" alt="Edit Profile" class="imgUser">
            </button>
        </div>
    @endauth
</nav>
