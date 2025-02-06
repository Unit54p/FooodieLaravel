<link rel="stylesheet" href="{{ asset('css/AboutUs.css') }}">
<nav class="px-10 py-5  flex justify-between align-middle ">
    <ul class="flex justify-start items-center">
        {{--
        ctrl shift f untuk mencari sesuatu secara global
        misal disini lupa letak navLi dikelas mana, maka cari menggunakan cara tersebut
        --}}
        <li>
            <a class="navLi  {{ Request::is('Home') ? 'active' : '' }}"" href=" /Home">Home</a>
        </li>
        <li>
            <a class="navLi {{ Request::is('foods') ? 'active' : '' }}"" href=" {{ route('foodsName') }}">Foods</a>
        </li>
        <li>
            <a class=" navLi {{ Request::is('drinks') ? 'active' : '' }}" href="/drinks">Drinks</a>
        </li>
        <li>
            <a class="navLi {{ Request::is('apps') ? 'active' : '' }}"" href=" /apps">Apps</a>
        </li>
        <li>
            <a class="navLi {{ Request::is('about') ? 'active' : '' }}"" href=" /about">About Us</a>
        </li>
    </ul>
    <div class="flex justify-end flex-row userProfile gap-4">
        {{-- <a href="{{ route('editUserView', Auth::user()->id) }}" class="navLi">Welcome, {{ Auth::user()->name }}</a>
        --}}
        @auth
            <img src="{{ asset('img/cart.svg') }}" alt="" style="width: 12%" class="hover:cursor-pointer hover:scale-110 ">
            <button onclick="window.location='{{ route('editUserView', ['id' => Auth::user()->id]) }}'" style="width: 12%"
                class="btn_img ">
                <img src="{{ Storage::url(Auth::user()->imgProfile) }}" alt="Edit Profile" class="imgUser">
        @endauth
        </button>
    </div>
</nav>
