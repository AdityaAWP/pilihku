@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 m project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 d-flex mt-2 p-0">
                        <h4>Edit Kandidat</h4>
                    </div>
                    <div class="col-md-6 p-0">
                        <a href="{{ route('admin.candidates.index', request()->organization->slug) }}" class="btn btn-danger btn-sm ms-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <form class="p-4" method="post" action="{{ route('admin.candidates.update', ['organizationSlug' => request()->organization->slug, 'candidate' => $candidate->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col mb-4">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $candidate->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-4">
                            <label for="candidate_no">Nomor Kandidat <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('candidate_no') is-invalid @enderror" id="candidate_no" name="candidate_no" value="{{ old('candidate_no', $candidate->candidate_no) }}">
                            @error('candidate_no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="photo" class="form-label">Foto <span class="text-danger">*</span></label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo">
                            @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <img style="max-width: 200px; max-height: 200px;" src="{{ asset('storage/candidates/'.$candidate->photo) }}" alt="">
                        </div>
                        <div class="col mb-4">
                            <label for="bio">Bio</label>
                            <div class="editor-container editor-container_inline-editor" id="editor-container">
                                <div class="editor-container__editor">
                                    <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="10" cols="30" id="editor">{{ $candidate->bio }}</textarea>
                                </div>
                            </div>
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