<link rel="stylesheet" href="css/navbar.css">

@extends('layouts/layBas')
@section('title', 'Fooodie About Us')

@section('navbar')
<x-navbar />
@endsection

@section('body')
<main class="min-h-100">
    <div class="mainContainer  flex justify-center flex-col">
        <span class="text-center text-4xl my-4">Contact</span>
        <div class="flex justify-center">
            1 <table class=" ">
                <tr>
                    <td>Contact Number</td>
                    <td class="px-3">:</td>
                    <td>+ 62 999-9999-9999</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td class="px-3">:</td>
                    <td>fooodie@gmail.com</td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td class="px-3">:</td>
                    <td>@foodtivity_</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td class="px-3">:</td>
                    <td>Jln. 3 pahlawan, no.23</td>
                </tr>
            </table>
        </div>

    </div>

    <div class="mainContainer  flex justify-center flex-col">


        <span class="text-center text-4xl my-4">Our word</span>
        <div class=" flex justify-center ">


            <span class="kataKata text-center font-thin text-xl ">Fooodie merupakan destinasi kuliner yang lahir pada tahun 2025, membawa pengalaman rasa yang menghubungkan tradisi dengan inovasi. Kami menyajikan beragam menu mulai dari makanan berat yang memuaskan, camilan ringan yang penuh cita rasa, hingga minuman segar yang menyegarkan hari Anda. Setiap hidangan di Fooodie dirancang untuk menggugah selera, menampilkan kelezatan dari berbagai budaya, baik yang lokal maupun mancanegara.

                Kami percaya bahwa makanan lebih dari sekadar kebutuhan, tetapi sebuah pengalaman yang mampu membawa Anda menjelajahi rasa, cerita, dan kenangan. Di Fooodie, setiap gigitan adalah perjalanan kuliner yang menghubungkan dunia, mempersembahkan cita rasa otentik dan inovatif, serta menciptakan momen tak terlupakan.
                dan juga tak pernah kami lupakan ucapa terimakasih kepada para costumer yang telah pernah hadir ke restoran kami.

                -Unit 54p

                Rasakan keajaiban rasa yang tak terhingga, hanya di
                Fooodie</span>



        </div>

    </div>

</main>
@endsection

@section('footer')
<x-footer />

@endsection
