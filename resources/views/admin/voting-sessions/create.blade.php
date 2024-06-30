@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 m project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 d-flex mt-2 p-0">
                        <h4>Tambah Sesi Voting</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <form class="p-4" method="post" action="{{ route('admin.voting-sessions.store', $organization->slug) }}">
                    @csrf
                    <div class="form-row">
                        <div class="col mb-4">
                            <label for="logo" class="form-label">Nama Pemilihan</label>
                            <input class="form-control @error('logo') is-invalid @enderror" type="text" id="title" name="title" placeholder="Pemilihan Ketua {{ date('Y') }}">
                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-4">
                            <label for="description">Deskripsi / Informasi</label>
                            <div class="editor-container editor-container_inline-editor" id="editor-container">
                                <div class="editor-container__editor">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="10" cols="30" id="editor"></textarea>
                                </div>
                            </div>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="voting_date" class="form-label">Tanggal Pemilihan</label>
                                    <div class="input-group">
                                        <input class="datepicker-here form-control digits @error('voting_date') is-invalid @enderror" type="text" id="voting_date" name="voting_date" data-language="en">
                                    </div>
                                    @error('voting_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <label for="start" class="form-label">Mulai</label>
                                    <div class="input-group clockpicker">
                                        <input class="form-control @error('start') is-invalid @enderror" name="start" id="start" type="text" value="09:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                    @error('start')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="end" class="form-label">Selesai</label>
                                    <div class="input-group clockpicker">
                                        <input class="form-control @error('end') is-invalid @enderror" name="end" id="end" type="text" value="10:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                    @error('end')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
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
        $('#voting_date').datepicker({
            dateFormat: "yyyy-mm-dd"
        }).val();
    </script>
@endpush
