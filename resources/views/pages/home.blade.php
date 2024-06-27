@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">


<div style="display: flex; flex-direction: column; min-height: 100vh; position: relative;">
    @include('components.header')
    {{-- Jumbotron --}}
    <div class="jumbotron position-relative" style="flex: 1; background: linear-gradient(rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5) 100%), url('{{ asset('images/bg-1.jpg') }}'); color: #fff; text-align: center; display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <div>
            <h1 class="display-4 slogan">PILIHANMU, MASA DEPAN KITA</h1>
        </div>
        <div class="box-overflow">
            <div>
                <img class="box-content-animate" src="{{ asset('images/Logo.png') }}" alt="Logo" style="width: 200px;" class="mt-3">
            </div>
            <div class="box-content box-content-animate">
                <h4 style="margin-bottom: 10px;">Sebagai Mayoritas Pemilih, Kita Memiliki Andil Yang Besar
                    Untuk Menentukan Masa Depan</h4>
                <p>Website ini menyediakan informasi seputar isu, dan kandidat Calon Pemimpin yang relevan untuk membuat keputusan di Pemilihan 2024.</p>
            </div>
        </div>
    </div>
    {{-- End Jumbotron --}}

    {{-- Container rekam jejak --}}
    <div class="container mb-4 rekam-jejak-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mb-5">
                    <h1>Rekam Jejak Kandidat</h1>
                </div>
                <div class="card rekam-jejak-card">
                    <div class="card-body p-2">
                        <p class="m-0">Kandidat Ketua dan Wakil Ketua memainkan peran sentral dalam pemilihan,
                            sehingga penting untuk memahami latar belakang, dan visi misi mereka.</p>
                    </div>
                </div>
                <div class="text-center mt-5 rounded-pill">
                    <button class="btn" style="background-color: #FFE500"><a style="text-decoration: none; color: black" href="{{ route('candidate') }}">Lihat Profil Kandidat</a></button>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">No 1</h5>
                                <div class="d-flex justify-content-between">
                                    <div class="rekam-jejak-imageWrapper">
                                        <img src="{{ asset('images/person.png') }}" alt="Image 5" class="img-fluid mb-2" style="width: 100%;"> 
                                        <p>Nama Kandidat</p>
                                    </div>
                                    <div class="rekam-jejak-imageWrapper">
                                        <img src="{{ asset('images/person.png') }}" alt="Image 5" class="img-fluid mb-2" style="width: 100%;"> 
                                        <p>Nama Kandidat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">No 2</h5>
                                <div class="d-flex justify-content-between">
                                    <div class="rekam-jejak-imageWrapper">
                                        <img src="{{ asset('images/person.png') }}" alt="Image 5" class="img-fluid mb-2" style="width: 100%;"> 
                                        <p>Nama Kandidat</p>
                                    </div>
                                    <div class="rekam-jejak-imageWrapper">
                                        <img src="{{ asset('images/person.png') }}" alt="Image 5" class="img-fluid mb-2" style="width: 100%;"> 
                                        <p>Nama Kandidat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">No 3</h5>
                                <div class="d-flex justify-content-between">
                                    <div class="rekam-jejak-imageWrapper">
                                        <img src="{{ asset('images/person.png') }}" alt="Image 5" class="img-fluid mb-2" style="width: 100%;"> 
                                        <p>Nama Kandidat</p>
                                    </div>
                                    <div class="rekam-jejak-imageWrapper">
                                        <img src="{{ asset('images/person.png') }}" alt="Image 5" class="img-fluid mb-2" style="width: 100%;"> 
                                        <p>Nama Kandidat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Quiz Section --}}
    <div class="quiz-section">
        <div class="quiz-box">
            <div class="quiz-images">
                <div>
                    <img src="{{ asset('images/person.png') }}" alt="Candidate 1">
                </div>
                <div>
                    <img src="{{ asset('images/person.png') }}" alt="Candidate 2">
                </div>
                <div>
                    <img src="{{ asset('images/person.png') }}" alt="Candidate 3">
                </div>
            </div>
            <div class="quiz-slogan">
                Quiz CaKetum CaWaKetum 2024
            </div>
            <div class="quiz-description">
                <p class="text-start">Ini adalah kuis CaWaketum. Tujuan kuis adalah untuk memberikan 
                    rekomendasi berdasarkan kedekatanmu dengan isu-isu yang diusung oleh 
                    kandidat Calon Ketua dan Calon Wakil Ketua.
                    Kenali programnya, baru pilih!!!</p>
            </div>
            <div class="quiz-button">
                <button class="btn" style="background-color: #FFE500;">Mulai</button>
            </div>
        </div>
    </div>
    {{-- End Quiz Section --}}

    {{-- End Quiz Section --}}

{{-- Candidate Overflow Section --}}
<div class="container candidate-section">
    <div class="candidate-overflow-box">
        <div class="candidate-row">
            <div class="candidate-card">
                <h5 class="card-title mb-5">No 1</h5>
                <div class="candidate-images">
                    <div class="candidate-image-wrapper">
                        <img src="{{ asset('images/person.png') }}" alt="Candidate 1">
                        <p>Nama Kandidat 1</p>
                    </div>
                    <div class="candidate-image-wrapper">
                        <img src="{{ asset('images/person.png') }}" alt="Candidate 2">
                        <p>Nama Kandidat 2</p>
                    </div>
                </div>
            </div>
            <div class="candidate-card">
                <h5 class="card-title mb-5">No 2</h5>
                <div class="candidate-images">
                    <div class="candidate-image-wrapper">
                        <img src="{{ asset('images/person.png') }}" alt="Candidate 3">
                        <p>Nama Kandidat 3</p>
                    </div>
                    <div class="candidate-image-wrapper">
                        <img src="{{ asset('images/person.png') }}" alt="Candidate 4">
                        <p>Nama Kandidat 4</p>
                    </div>
                </div>
            </div>
            <div class="candidate-card">
                <h5 class="card-title mb-5">No 3</h5>
                <div class="candidate-images">
                    <div class="candidate-image-wrapper">
                        <img src="{{ asset('images/person.png') }}" alt="Candidate 5">
                        <p>Nama Kandidat 5</p>
                    </div>
                    <div class="candidate-image-wrapper">
                        <img src="{{ asset('images/person.png') }}" alt="Candidate 6">
                        <p>Nama Kandidat 6</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slogan-row">
        <h2>Beri suaramu untuk memilih 
            calon Ketua dan Wakil Ketua</h2>
    </div>
    <div class="button-row">
        <button class="btn btn-secondary" style="padding: 10px 80px; font-size: 20px; background-color: #FFE500; border: none; color: black">PILIH !!!</button>
    </div>
</div>
{{-- End Candidate Overflow Section --}}

@include('components.footer')



</div>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script>

@endsection
