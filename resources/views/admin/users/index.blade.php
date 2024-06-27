@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 mt-2 p-0 d-flex">
                        <h4>Anggota</h4>
                    </div>
                    <div class="col-md-6 p-0">                    
                        <a href="{{ route('admin.users.create', request()->organization->slug) }}" class="btn btn-primary btn-sm ms-2">+ Tambah</a>
                        {{-- <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"><i class="fa fa-table mr-2"></i> Import</button> --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Anggota</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('/pegawai/import') }}" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <label for="file_excel">File Excel</label>
                                                <input type="file" name="file_excel" id="file_excel" class="form-control @error('file_excel') is-invalid @enderror">
                                                @error('file_excel')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-secondary" type="submit">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <form action="{{ route('admin.users.index', request()->organization->slug) }}">
                        <div class="row mb-2">
                            <div class="col-2">
                                <input type="text" placeholder="Search...." class="form-control" value="{{ request('search') }}" name="search">
                            </div>
                            <div class="col">
                                <button type="submit" id="search"class="border-0 mt-3" style="background-color: transparent;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="mytable">
                            <thead>
                                <tr>
                                    <th width="1%">No.</th>
                                    <th width="20%">Foto</th>
                                    <th width="20%">Nama</th>
                                    <th width="20%">Username</th>
                                    <th width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset("storage/profile_photo/".$value->profile_photo) }}" alt="profile" style="max-width: 80px; max-height: 80px;"></td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->username }}</td>
                                        <td>
                                            <ul class="action"> 
                                                <li class="edit me-2"><a href="{{ route('admin.users.edit', ['organizationSlug' => request()->organization->slug, 'user' => $value->id]) }}" title="Edit User"><i class="icon-pencil-alt"></i></a></li>

                                                {{-- <li class="me-2"><a href="{{ url('/pegawai/edit-password/'.$du->id) }}" title="Ganti Password"><i class="fa fa-solid fa-key" style="color: rgb(11, 18, 222)"></i></a></li> --}}

                                                
                                                <li><a href="{{ route('admin.users.face-recognition', ['organizationSlug' => request()->organization->slug, 'user' => $value->id]) }}" title="Face Recognition"><i style="color: black" class="fa fa-solid fa-camera"></i></a></li>

                                                <li class="delete">
                                                    <form action="{{ route('admin.users.destroy', ['organizationSlug' => request()->organization->slug, 'user' => $value->id]) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button title="Delete Anggota" class="border-0" style="background-color: transparent;" onClick="return confirm('Are You Sure')"><i class="icon-trash"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end me-4 mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




