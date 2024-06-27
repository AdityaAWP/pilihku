@extends('layouts.app')

@section('content')
<link href="{{ asset('css/issue.css') }}" rel="stylesheet">
@include('components.header')

<div class="title container text-center"><h2>Tangapan Isu Paslon Nomor 1</h2></div>

<div class="container candidate-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex justify-content-center align-items-center">
                <div >
                    <img src="{{ asset('images/person.png') }}" alt="">
                </div>
                <div >
                    <h5>Nama Calon</h5>
                    <p>Calon Ketua</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('images/person.png') }}" alt="">
                </div>
                <div class="col-md-4">
                    <h5>Nama Calon</h5>
                    <p>Calon Wakil Ketua</p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container issues-container">
    <h2 class="mb-5">List Isu</h2>

    <div class="row">
        <div class="col-md-12 issue-wrapper">
            @include('components.IssueDropdown', ['issue' => 'Korupsi dan Manajemen Dana'])
        </div>
        <div class="col-md-12 issue-wrapper">
            @include('components.IssueDropdown', ['issue' => 'Kesetaraan Berpendapat'])
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 issue-wrapper">
            @include('components.IssueDropdown', ['issue' => 'Masalah Masalah Internal'])
        </div>
        <div class="col-md-12 issue-wrapper">
            @include('components.IssueDropdown', ['issue' => 'Mandeknya Acara'])
        </div>
    </div>
</div>
@include('components.footer')
<script src="{{ asset('js/issues.js') }}"></script>
{{-- <script src="{{ asset('js/script.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script> --}}

@endsection
