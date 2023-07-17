@extends('layouts.admin')
@section('header', 'Author')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <a>Data Author</a>
                    </div>

                    <div class="card-body"> 
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">Address</th>                                  
                                    <th class="text-center">Created ad</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $key => $author)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td class="text-center">{{ $author->name }}</td>
                                    <td class="text-center">{{ $author->email }}</td>
                                    <td class="text-center">{{ $author->phone_number }}</td>
                                    <td class="text-center">{{ $author->address }}</td>                  
                                    <td class="text-center">{{ date('H:i:s - d M Y', strtotime($author->created_at)) }}</td>                                                 
                                </tr>
                                @endforeach
                            </tbody>
</table>
</div>

<div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
</ul>
</div>
</div>
@endsection