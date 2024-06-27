@extends('layouts.app')

@section('content')
<link href="{{ asset('css/candidate.css') }}" rel="stylesheet">
@include('components.header')

<div class="title container text-center">
    <h1>Kenali Rekam Jejak, Gagasan, dan Isu Kandidat</h1>
</div>
{{-- Kandidat --}}
<div class="container candidate-wrapper">
    <h4>Pelajari Rekam Jejak Para Paslon</h4>
    <div class="candidate-profile">
        @for ($i = 1; $i <= 3; $i++)
        <div class="row candidate-row">
            <div class="col-md-4" style="border-radius: 10px;">
                <div class="profile-details">
                    <h4>No {{ $i }}</h4>
                    <div class="row justify-content-center text-center">
                        <div class="col-md-5 image-wrapper">
                            <img src="{{ asset('images/person.png') }}" alt="">
                            <p>Calon {{ $i }}</p>
                        </div>
                        <div class="col-md-5 image-wrapper">
                            <img src="{{ asset('images/person.png') }}" alt="">
                            <p>Calon {{ $i }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vision-mission">
                    <h2>Visi</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero in tortor finibus
                        ornare. Donec non nulla magna.</p>
                    <h2>Misi</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Consectetur adipiscing elit.</li>
                        <li>Nulla convallis libero in tortor.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="learn-more">
                    <a href="{{ route('candidateDetails') }}" class="btn" style="background-color: #FFE500;">Pelajari Profile</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
{{-- End Kandidat --}}

{{-- Isu --}}
<div class="container issue-wrapper">
    <h4>Pelajari Tanggapan Isu Para Paslon</h4>
    <div class="issue-candidate-wrapper">
        <div class="row">
            @for ($i = 1; $i <= 3; $i++)
            <div class="col-md-4">
                <div class="issue-candidate justify-content-center">
                    <div class="row align-items-center mb-5" >
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <h4>No {{ $i }}</h4>
                        </div>
                        <div class="col-md-2">
                                <a href="{{ route('issues') }}" class="btn" style="background-color: #FFE500;">Pelajari</a>
                        </div>
                    </div>  
                    <div class="row justify-content-center text-center">
                        <div class="col-md-5" >
                            <img src="{{ asset('images/person.png') }}" alt="">
                            <p>Calon {{ $i }}</p>
                        </div>
                        <div class="divided col-md-1"></div>
                        <div class="col-md-5">
                            <img src="{{ asset('images/person.png') }}" alt="">
                            <p>Calon {{ $i }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>


@include('components.footer')



</div>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script>

@endsection
