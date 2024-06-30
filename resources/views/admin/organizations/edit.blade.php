@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 m project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 p-0 d-flex mt-2">
                        <h4>Edit Informasi {{ $organization->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <form class="p-4" method="post" action="{{ route('admin.organizations.update', $organization->slug) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-center my-3">
                        <div class="text-center">
                            <img style="max-width: 200px; max-height: 200px;" src="{{ asset('storage/logo/'.$organization->logo) }}" alt="logo">
                            <h4 class="mt-2">{{ $organization->name }}</h4>
                        </div>
                    </div>


                    <div class="form-row">
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
                            {{-- <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" cols="30" rows="10">{{ $organization->bio }}</textarea> --}}
                            <div class="editor-container editor-container_inline-editor" id="editor-container">
                                <div class="editor-container__editor">
                                    <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="10" id="editor">{{ $organization->bio }}</textarea>
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


@push('script')
    <script>
        editor.setData('{{ $organization->bio }}')
    </script>
@endpush