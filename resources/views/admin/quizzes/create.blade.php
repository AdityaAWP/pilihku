@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 m project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 d-flex mt-2 p-0">
                        <h4>Tambah Pertanyaan Kuis</h4>
                    </div>
                    <div class="col-md-6 p-0">
                        <a href="{{ route('admin.quizzes.index', request()->organization->slug) }}" class="btn btn-danger btn-sm ms-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <form class="p-4" method="post" action="{{ route('admin.quizzes.store', request()->organization->slug) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col mb-4">
                            <label for="question">Pertanyaan</label>
                            <div class="editor-container editor-container_inline-editor" id="editor-container">
                                <div class="editor-container__editor">
                                    <textarea name="question" class="form-control @error('question') is-invalid @enderror" rows="10" cols="30" id="editor"></textarea>
                                </div>
                            </div>
                            @error('question')
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
