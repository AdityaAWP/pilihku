@extends('layouts.app')

@section('content')
<link href="{{ asset('css/candidateDetails.css') }}" rel="stylesheet">
@include('components.header')

<div class="container title text-center">
    <h2>Calon Nomor {{ $candidate->candidate_no }}</h2>
</div>

<div class="back container">
    <p><a href="{{ route('candidate') }}" style="text-decoration: none; color: black;">< Kandidat Lainnya</a></p>
</div>

{{-- Details --}}
<div class="container details-wrapper">
    <div class="candidatWrapper">
        <div class="imageWrapper">
            <img src="{{ asset("storage/candidates/".$candidate->photo) }}" alt="{{ $candidate->name }}">
        </div>
        <h1>{{ $candidate->name }}</h1>
    </div>
    <div class="card">
        <div class="card-body">
          <h3>🔍Rekam Jejak</h3>
          <div class="content">
          <h5>Bio</h5>
          <p>{{ $candidate->bio }}</p>
        </div>
        </div>
    </div>
</div>

{{-- Isu Details --}}
{{-- Isu --}}
<div class="container issue-candidate-wrapper">
    <div class="content">
        <img src="{{ asset("storage/candidates/".$candidate->photo) }}" alt="{{ $candidate->name }}">
        <h3>Pelajari Tanggapan Isu dari Kandidat ini</h3>
        <a href="{{ route('issues', ['id' => $candidate->id]) }}" class="btn" style="background-color: #4e7468; color: white">Pelajari Profile</a>
    </div>
</div>

@include('components.footer')

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script>

@endsection
