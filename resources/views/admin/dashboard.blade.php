@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="card p-4">
                @if (!isset($votingSession))
                    <div class="text-center">
                        <div>Anda belum membuat sesi voting</div>
                        <a href="{{ route('admin.voting-sessions.create', $organization->slug) }}" type="button" class="btn btn-primary mt-3">Buat Sesi Voting</a>
                    </div>
                @else
                <div class="card-header">
                    <h1 class="text-center">{{ $votingSession->title }}</h1>
                    <div class="text-justify" style="color: #a2a1a1 !important;">{!! nl2br($votingSession->description) !!}</div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card px-4">
                <div class="d-flex justify-content-center my-3">
                    <div>
                        <div class="text-center">
                            <img style="max-width: 200px; max-height: 200px;" src="{{ asset('storage/logo/' . $organization->logo) }}" alt="logo">
                            <h4 class="mt-2">{{ $organization->name }}</h4>
                            <span class="text-secondary"><i width="5px;" class="fa fa-users"></i> {{ $memberCount }} anggota</span>
                        </div>
                        <p class="text-justify" style="color: #a2a1a1;">{!! nl2br($organization->bio) !!}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
