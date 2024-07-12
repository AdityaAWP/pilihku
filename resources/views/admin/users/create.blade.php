@extends('layouts.admin')

@push('script-top')
    <script src="{{ asset('/face/dist/face-api.min.js') }}"></script>
    <script>
        faceapi.nets.ageGenderNet.loadFromUri("{{ asset('/face/weights') }}"),
            faceapi.nets.ssdMobilenetv1.loadFromUri("{{ asset('/face/weights') }}"),
            faceapi.nets.tinyFaceDetector.loadFromUri("{{ asset('/face/weights') }}"),
            faceapi.nets.faceLandmark68Net.loadFromUri("{{ asset('/face/weights') }}"),
            faceapi.nets.faceRecognitionNet.loadFromUri("{{ asset('/face/weights') }}"),
            faceapi.nets.faceExpressionNet.loadFromUri("{{ asset('/face/weights') }}")
    </script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 m project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 d-flex mt-2 p-0">
                        <h4>Tambah Anggota</h4>
                    </div>
                    <div class="col-md-6 p-0">
                        <a href="{{ route('admin.users.index', request()->organization->slug) }}" class="btn btn-danger btn-sm ms-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <form class="p-4" method="post" action="{{ route('admin.users.store', request()->organization->slug) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col mb-4">
                            <label for="name">Nama Anggota <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="username">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" au class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="profile_photo" class="form-label">Foto Profil <span class="text-danger">*</span></label>
                            <input class="form-control @error('profile_photo') is-invalid @enderror" type="file" id="profile_photo" name="profile_photo">
                            @error('profile_photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="hidden" name="descriptor" id="descriptor">
                            @error('descriptor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(async function() {
            File.prototype.convertToBase64 = function(callback) {
                var reader = new FileReader();
                reader.onloadend = function(e) {
                    callback(e.target.result, e.target.error);
                };
                reader.readAsDataURL(this);
            };

            $('#profile_photo').on('change', async function() {
                var selectedFile = this.files[0];
                selectedFile.convertToBase64(async function(base64) {
                    var img = document.createElement('img');
                    img.src = base64;

                    createOverlay("Proses...");
                    const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor();
                    gOverlay.hide();
                    console.log(detections);

                    if (detections == null || detections == "null" || typeof(detections) == undefined || typeof(detections) == "undefined") {
                        Swal.fire(
                            'Gagal',
                            'Tidak dapat mendeteksi wajah pada foto.',
                            'error'
                        )
                    } else {
                        $('#descriptor').val(detections.descriptor)
                        Swal.fire(
                            'Berhasil',
                            'Wajah terdeteksi!',
                            'success'
                        )
                    }
                })
            })
        })
    </script>
@endpush
