<link rel="stylesheet" href="{{ asset('css/navbarAdmin.css') }}">
<link rel="stylesheet" href="css/navbar.css">
<nav class="px-10 py-5">
    <ul class="flex justify-between items-center ">
        <div class="flex justify-start gap-3">
            <li class="navLi {{ Request::is('Admin') ? 'active' : '' }}">
                <a href="{{ route('adminHome') }}">Home</a>
            </li>

            <li class="navLi {{ Route::currentRouteName() === 'adminHome/productManagement' ? 'active' : '' }}">
                <a href="{{ route('productManagement') }}">Product Management</a>
            </li>



        </div>
        <div>
            <li class="navLi btn_logOut {{ Request::is('logOut') ? 'active' : '' }}">
                <a href="/logOut">Log out</a>
            </li>
        </div>
    </ul>
</nav>
