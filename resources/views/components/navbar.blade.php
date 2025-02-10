<nav class="px-10 py-5  flex justify-between align-middle ">
    <ul class="flex justify-start items-center">
        <li>
            <a class="navLi  {{ Request::is('Home') ? 'active' : '' }}"" href=" /Home">Home</a>
        </li>
        <li>
            <a class="navLi {{ Request::is('foods') ? 'active' : '' }}"" href=" {{ route('foodsView') }}">Foods</a>
        </li>
        <li>
            <a class=" navLi {{ Request::is('drinks') ? 'active' : '' }}" href="/drinks">Drinks</a>
        </li>
        <li>
            <a class="navLi {{ Request::is('apps') ? 'active' : '' }}" href=" /apps">Apps</a>
        </li>
        <li>
            <a class="navLi {{ Request::is('about') ? 'active' : '' }}" href=" /about">About Us</a>
        </li>
    </ul>

    <div class="flex justify-end flex-row userProfile gap-4">
        @auth
        <button onclick="window.location='{{ route('cartView', Auth::user()->id)}}'" class="btn_img w-12 h-12 flex items-center justify-center rounded-lg
            {{ Request::is('cart') ? 'btnImg_active' : '' }}">

            <img src="{{ asset('img/cart.svg') }}" alt="" class="imgNavbar w-10 h-10">
        </button>
        @endauth
        @auth
        <button onclick="window.location='{{ route('editUserView', ['id' => Auth::user()->id]) }}'" class="btn_img w-12 h-12 flex items-center justify-center rounded-lg
            {{ Route::currentRouteName() === 'editUserView' ? 'btnImg_active' : '' }}">

            <img src="{{ Storage::url(Auth::user()->imgProfile) }}" alt="Edit Profile" class="imgNavbar w-10 h-10 object-cover rounded-full">
        </button>
        @endauth
    </div>


</nav>
