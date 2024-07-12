@extends('layouts.app')

@push('script-top')
    <script src="{{ asset('/face/dist/face-api.min.js') }}"></script>
    <script>
        faceapi.nets.ageGenderNet.loadFromUri("{{ asset('/face/weights') }}")
        faceapi.nets.ssdMobilenetv1.loadFromUri("{{ asset('/face/weights') }}")
        faceapi.nets.tinyFaceDetector.loadFromUri("{{ asset('/face/weights') }}")
        faceapi.nets.faceLandmark68Net.loadFromUri("{{ asset('/face/weights') }}")
        faceapi.nets.faceRecognitionNet.loadFromUri("{{ asset('/face/weights') }}")
        faceapi.nets.faceExpressionNet.loadFromUri("{{ asset('/face/weights') }}")
    </script>
@endpush

@section('content')
    <link href="{{ asset('css/faceRecognition.css') }}" rel="stylesheet">

    <div class="container my-4">
        <h1 class="mb-5 text-center">Vote untuk Kandidat {{ $candidate->candidate_no }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="camera-container" class="text-center">
                    <video id="camera-stream" width="100%" autoplay></video>
                    <button id="capture-button" class="btn mt-3">Voting</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Hidden Form for store votes --}}
    <form action="{{ route('voting.store', $candidate->id) }}" style="display: none;" method="POST" id="formVoteStore">
        @csrf
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('camera-stream');
            const captureButton = document.getElementById('capture-button');

            // Get access to the camera
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(function(stream) {
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function(error) {
                        Swal.fire(
                            'Gagal',
                            'Kamera tidak diizinkan. Harap berikan izin untuk menggunakan kamera lalu refresh halaman ini.',
                            'error'
                        )
                    });
            } else {
                Swal.fire(
                    'Gagal',
                    'Perangkat Anda tidak mendukung akses kamera.',
                    'error'
                )
            }

            File.prototype.convertToBase64 = function(callback) {
                var reader = new FileReader();
                reader.onloadend = function(e) {
                    callback(e.target.result, e.target.error);
                };
                reader.readAsDataURL(this);
            };

            captureButton.addEventListener('click', async function() {
                // Logic for capturing the video frame for face recognition
                createOverlay("Proses...");
                const input = document.getElementById('camera-stream')

                const detections = await faceapi.detectSingleFace(input).withFaceLandmarks().withFaceDescriptor();
                gOverlay.hide();
                console.log(detections);

                if (detections == null || detections == "null" || typeof(detections) == undefined || typeof(detections) == "undefined") {
                    Swal.fire(
                        'Gagal',
                        'Tidak dapat mendeteksi wajah pada foto.',
                        'error'
                    )
                } else {
                    // alert('Wajah terdeteksi!');
                    let dist = faceapi.euclideanDistance(detections.descriptor, [{{ auth()->user()->descriptor }}])
                    if (dist < 0.6) {
                        Swal.fire(
                            'Berhasil',
                            'Wajah cocok!',
                            'success'
                        )
                        document.querySelector('#formVoteStore').submit();
                    } else {
                        Swal.fire(
                            'Gagal',
                            'Wajah tidak sama.',
                            'error'
                        )
                    }
                }
            });
        });
    </script>
@endsection
