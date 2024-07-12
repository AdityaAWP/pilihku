@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/voting.css') }}" rel="stylesheet">
    @include('components.header')
    <div class="vote container">
        <h1 class="mb-5 text-center">Voting Kandidat Pilihanmu</h1>
        <div class="row justify-content-center">
            <!-- Kandidat -->
            @foreach ($candidates as $candidate)
                <div class="col-md-4">
                    <div class="card candidate-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Kandidat {{ $candidate->candidate_no }}</h5>
                            @if (isset($candidate->name_2))
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Ketua</p>
                                        <div class="imageWrapper">
                                            <img style="max-width: 80%; height: auto;" src="{{ asset("storage/candidates/".$candidate->photo) }}" class="card-img-top" alt="Kandidat {{ $candidate->candidate_no }}">
                                        </div>
                                        <p class="card-text">{{ $candidate->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Wakil</p>
                                        <div class="imageWrapper">
                                            <img style="max-width: 80%; height: auto;" src="{{ asset("storage/candidates/".$candidate->photo_2) }}" class="card-img-top" alt="Kandidat {{ $candidate->candidate_no }}">
                                        </div>
                                        <p class="card-text">{{ $candidate->name_2 }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="imageWrapper">
                                    <img src="{{ asset('storage/candidates/' . $candidate->photo) }}" class="card-img-top" alt="Kandidat {{ $candidate->candidate_no }}">
                                </div>
                                <p class="card-text">{{ $candidate->name }}</p>
                            @endif

                            @if ($isUserHasVoted)
                                @if (count($candidate->userVotes) > 0)
                                    <p class="text-success">Kandidat pilihan anda.</p>
                                @else
                                    <p class="text-danger">-</p>
                                @endif
                            @else
                                <a href="{{ route('face-recognition', ['id' => $candidate->id]) }}" class="btn">Voting</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
