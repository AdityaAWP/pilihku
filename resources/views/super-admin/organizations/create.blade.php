@extends('layouts.super-admin')
@section('content')
    <div class="row">
        <div class="col-md-12 m project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 p-0 d-flex mt-2">
                        <h4>Tambah Organisasi</h4>
                    </div>
                    <div class="col-md-6 p-0">                    
                        <a href="{{ route('super-admin.organizations.index') }}" class="btn btn-danger btn-sm ms-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <form class="p-4" method="post" action="{{ route('super-admin.organizations.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col mb-4">
                            <label for="name">Nama Organisasi</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="logo" class="form-label">Logo</label>
                            <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo">
                            @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="bio">Bio</label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" cols="30" rows="10">{{ old('bio') }}</textarea>
                            @error('bio')
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
