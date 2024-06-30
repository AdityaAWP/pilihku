@extends('layouts.app')

@section('content')
<link href="{{ asset('css/candidate.css') }}" rel="stylesheet">
@include('components.header')

<div class="title container text-center">
    <h1>Kenali Rekam Jejak, Gagasan, dan Isu Kandidat</h1>
</div>
{{-- Kandidat --}}
<div class="container candidate-wrapper">
    <h4 class="candidateTitle">Pelajari Rekam Jejak Para Paslon</h4>
    <div class="candidate-profile">
        @foreach ($candidates as $candidate)
        <div class="row candidate-row">
            <div class="col-md-3" style="border-radius: 10px;">
                <h4>No {{ $candidate->candidate_no }}</h4>
                <div class="profile-details">
                    <img src="{{ asset($candidate->photo) }}" alt="{{ $candidate->name }}">
                    <p>{{ $candidate->name }}</p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="vision-mission">
                    <h2>Visi Misi</h2>
                    <p>{{ $candidate->bio }}</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="learn-more">
                    <a href="{{ route('candidateDetails', ['id' => $candidate->id]) }}" class="btn" style="background-color: #4e7468; color: white">Pelajari Profile</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- End Kandidat --}}

{{-- Isu --}}
<div class="container issue-wrapper">
    <h4>Pelajari Tanggapan Isu Para Paslon</h4>
    <div class="issue-candidate-wrapper">
        <div class="row justify-content-around">
            @foreach ($candidates as $candidate)
            <div class="col-md-3 card">
                <div class="text-center">
                        <h4>No {{ $candidate->candidate_no }}</h4>
                </div>
                <div class="imageWrapper">
                    <img src="{{ asset($candidate->photo) }}" alt="{{ $candidate->name }}">
                    <p>{{ $candidate->name }}</p>
                </div>
                <a href="{{ route('issues') }}" class="btn" style="background-color: #4e7468; color: white; width: 200px; margin: auto">Pelajari</a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('components.footer')

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script>

@endsection
