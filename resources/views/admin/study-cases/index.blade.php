@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 mt-2 p-0 d-flex">
                        <h4>Studi Kasus</h4>
                    </div>
                    <div class="col-md-6 p-0">                    
                        <a href="{{ route('admin.study-cases.create', request()->organization->slug) }}" class="btn btn-primary btn-sm ms-2">+ Tambah</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <form action="{{ route('admin.study-cases.index', request()->organization->slug) }}">
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
                                    <th width="5%" class="text-center">No</th>
                                    <th width="85%">Contoh Studi Kasus</th>
                                    <th width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cases as $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            {!! nl2br(substr($value->question, 0, 100)) !!}
                                            @if(strlen($value->question) > 100)
                                                ...
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="action"> 
                                                <li class="edit me-2"><a href="{{ route('admin.study-cases.edit', ['organizationSlug' => request()->organization->slug, 'study_case' => $value->id]) }}" title="Edit Studi Kasus"><i class="icon-pencil-alt"></i></a></li>

                                                <li class="delete">
                                                    <form action="{{ route('admin.study-cases.destroy', ['organizationSlug' => request()->organization->slug, 'study_case' => $value->id]) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button title="Delete Studi Kasus" class="border-0" style="background-color: transparent;" onClick="return confirm('Are You Sure')"><i class="icon-trash"></i></button>
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
                        {{ $cases->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




