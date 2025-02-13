<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/home.css">
@extends('layouts/layBas')
@section('title', 'Fooodie About Us')

@section('navbar')
<x-navbar />
@endsection

@section('body')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: "Success!"
            , text: "{{ session('success') }}"
            , icon: "success"
            , confirmButtonText: "OK"
        });

    </script>
@endif
<div class=" ">
    <div class="text-center text-4xl my-8">FOOD</div>
    {{-- container --}}
    <div class="mx-4 flex justify-center">
        <div class="grid grid-cols-4">
            {{--Card Container--}}
                {{--Card --}}
                @foreach ($foodProducts as $product)
                    <div class="card mx-5 rounded-lg overflow-hidden shadow-lg mb-6 cursor-pointer"
                        data-img="{{ Storage::url($product->img) }}" data-title="{{ $product->name }}"
                        data-rating="{{ $product->rating }}" data-price="Rp. {{ number_format($product->price, 0, ',', '.') }}"
                        data-url="{{ route('addToCart', ['products_id' => $product->products_id]) }}">
                        <div>
                            <img src="{{ Storage::url($product->img) }}" alt="" class="card_img w-full object-contain">
                        </div>
                        <div class="cardCaption p-4">
                            <div class="flex items-center text-3xl">
                                <span class="flex-[4]">{{ $product->name }}</span>
                                <span class="flex-[1] text-xl">⭐{{ $product->rating }}</span>
                            </div>
                            <div class="text-start text-3xl mt-2">
                                Rp. {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
        <!-- Tombol Close -->
        <button id="closeModal" class="absolute top-2 right-2 text-2xl font-bold">&times;</button>

        <!-- Gambar Produk -->
        <img id="modalImg" src="" alt="" class="w-full h-48 object-contain mb-4">

        <!-- Nama Produk -->
        <h2 id="modalTitle" class="text-2xl font-bold mb-2"></h2>

        <!-- Rating -->
        <p id="modalRating" class="text-xl">⭐</p>

        <!-- Harga -->
        <p id="modalPrice" class="text-2xl font-semibold text-gray-800 mt-2"></p>

        <!-- Tombol Tambah ke Keranjang -->
        <form id="modalForm" action="" method="POST">
            @csrf
            <button class="btn_primary w-full mt-4">
                Tambah ke Keranjang
            </button>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll(".card");
        const modal = document.getElementById("modal");
        const closeModal = document.getElementById("closeModal");

        // Elemen dalam modal
        const modalImg = document.getElementById("modalImg");
        const modalTitle = document.getElementById("modalTitle");
        const modalRating = document.getElementById("modalRating");
        const modalPrice = document.getElementById("modalPrice");
        const modalForm = document.getElementById("modalForm");

        cards.forEach(card => {
            card.addEventListener("click", function () {
                // Ambil data dari atribut `data-*`
                modalImg.src = this.dataset.img;
                modalTitle.innerText = this.dataset.title;
                modalRating.innerText = "⭐ " + this.dataset.rating;
                modalPrice.innerText = this.dataset.price;
                modalForm.action = this.dataset.url;
                // Tampilkan modal
                modal.classList.remove("hidden");
            });
        });

        // Tombol close
        closeModal.addEventListener("click", function () {
            modal.classList.add("hidden");
        });

        // Klik di luar modal untuk menutup
        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });
    });
</script>
@endsection

@section('footer')
<x-footer />
@endsection
