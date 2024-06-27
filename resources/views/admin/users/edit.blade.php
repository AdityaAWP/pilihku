@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 m project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 d-flex mt-2 p-0">
                        <h4>Edit Anggota</h4>
                    </div>
                    <div class="col-md-6 p-0">
                        <a href="{{ route('admin.users.index', request()->organization->slug) }}" class="btn btn-danger btn-sm ms-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($user->profile_photo == null)
                            <img class="profile-user-img img-fluid img-circle" src="{{ url('assets/img/foto_default.jpg') }}" alt="User profile picture">
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/profile_photo/'.$user->profile_photo) }}" alt="User profile picture">
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Username</b> <a class="float-end" style="color: black">{{ $user->username }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Scan Face Recognition</b> <a class="float-end" style="color: black">{{ $user->face_recognition_photo == null ? 'Belum' : 'Sudah' }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-sm-9">
            <div class="card">
                <form class="p-4" method="post" action="{{ route('admin.users.update', ['organizationSlug' => request()->organization->slug, 'user' => $user->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col mb-4">
                            <label for="name">Nama Anggota <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ $user->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="password">Password</label>
                            <input type="password" au class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="profile_photo" class="form-label">Foto Profil</label>
                            <input class="form-control @error('profile_photo') is-invalid @enderror" type="file" id="profile_photo" name="profile_photo">
                            @error('profile_photo')
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
