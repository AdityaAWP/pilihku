@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 mt-2 p-0 d-flex">
                        <h4>Kandidat</h4>
                    </div>
                    <div class="col-md-6 p-0">                    
                        <a href="{{ route('admin.candidates.create', request()->organization->slug) }}" class="btn btn-primary btn-sm ms-2">+ Tambah</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <form action="{{ route('admin.candidates.index', request()->organization->slug) }}">
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
                                    <th width="5%" class="text-center">Nomor Kandidat</th>
                                    <th width="20%">Foto</th>
                                    <th width="20%">Nama</th>
                                    <th width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $value)
                                    <tr>
                                        <td class="text-center">{{ $value->candidate_no }}</td>
                                        <td><img src="{{ asset("storage/candidates/".$value->photo) }}" alt="profile" style="max-width: 80px; max-height: 80px;"></td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <ul class="action"> 
                                                <li class="me-2 text-primary"><a href="{{ route('admin.candidates.edit', ['organizationSlug' => request()->organization->slug, 'candidate' => $value->id]) }}" title="Detail Kandidat"><i class="icon-id-badge"></i></a></li>
                                                <li style="visibility: hidden;">.</li>
                                                
                                                <li class="edit me-2"><a href="{{ route('admin.candidates.edit', ['organizationSlug' => request()->organization->slug, 'candidate' => $value->id]) }}" title="Edit Kandidat"><i class="icon-pencil-alt"></i></a></li>

                                                <li class="delete">
                                                    <form action="{{ route('admin.candidates.destroy', ['organizationSlug' => request()->organization->slug, 'candidate' => $value->id]) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button title="Delete Kandidat" class="border-0" style="background-color: transparent;" onClick="return confirm('Are You Sure')"><i class="icon-trash"></i></button>
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
                        {{ $candidates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




