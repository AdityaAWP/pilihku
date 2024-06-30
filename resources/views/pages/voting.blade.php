@extends('layouts.app')

@section('content')
<link href="{{ asset('css/voting.css') }}" rel="stylesheet">
@include('components.header')
<div class="container vote">
    <h1 class="text-center mb-5">Voting Kandidat Pilihanmu</h1>
    <div class="row justify-content-center">
        <!-- Kandidat -->
        @foreach ($candidates as $candidate)
        <div class="col-md-4">
            <div class="card candidate-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Kandidat {{ $candidate->candidate_no }}</h5>
                    <div class="imageWrapper">
                        <img src="{{ asset($candidate->photo) }}" class="card-img-top" alt="Kandidat {{ $candidate->candidate_no }}">
                    </div>
                    <p class="card-text">{{ $candidate->name }}</p>
                    <a href="{{ route('face-recognition', ['id' => $candidate->id]) }}" class="btn">Voting</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
