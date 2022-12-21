@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-success" href="{{ route('catalogs.create') }}"> Create New Catalog</a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Updated At</th>
                            <th class="text-center">Total Books</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogs as $key => $catalog)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td class="text-center">{{ $catalog->name }}</td>
                            <td class="text-center">{{ date('H:i:s - d M Y', strtotime($catalog->created_at) )}}</td>
                            <td class="text-center">{{ date('H:i:s - d M Y', strtotime($catalog->updated_at) )}}</td>
                            <td class="text-center">{{ count($catalog->books)}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('catalogs.edit',$catalog->id) }}">Edit</a>
                                <form action="{{ route('catalogs.destroy',$catalog->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are You Sure?')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@endsection