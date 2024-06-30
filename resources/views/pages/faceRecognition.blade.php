@extends('layouts.app')

@section('content')
<link href="{{ asset('css/faceRecognition.css') }}" rel="stylesheet">

<div class="container my-4">
    <h1 class="text-center mb-5">Vote untuk Kandidat {{ $candidate->candidate_no }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="camera-container" class="text-center">
                <video id="camera-stream" width="100%" autoplay></video>
                <button id="capture-button" class="btn  mt-3">Voting</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const video = document.getElementById('camera-stream');
        const captureButton = document.getElementById('capture-button');

        // Get access to the camera
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function (error) {
                    alert('Kamera tidak diizinkan. Harap berikan izin untuk menggunakan kamera lalu refresh halaman ini.');
                });
        } else {
            alert('Perangkat Anda tidak mendukung akses kamera.');
        }

        captureButton.addEventListener('click', function () {
            // Logic for capturing the video frame for face recognition
            alert('Face recognition not implemented.');
        });
    });
</script>
@endsection
