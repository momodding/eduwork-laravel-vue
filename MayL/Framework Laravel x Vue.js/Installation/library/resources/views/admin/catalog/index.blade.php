@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <a href="{{ url('catalogs/create') }}" class="btn btn-primary pull-right">Create New Catalog</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Total Book</th>
                        <th>Created At</th>
                        {{-- <th>Updated At</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($catalogs as $key => $catalog)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $catalog->name }}</td>
                                <td>{{ count($catalog->catalogs) }}</td>
                                <td>{{ convert_date($catalog->created_at) }}</td>
                                {{-- <td>{{ date('H:i - d M Y', strtotime($catalog->updated_at)) }}</td> --}}
                                <td>
                                  <a href="{{ url('catalogs/'.$catalog->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                  <form action="{{ url('catalogs', ['id' => $catalog->id]) }}" method="post">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Areyou sure?')">
                                    @method('delete')
                                    @csrf
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                {{-- <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul> 
                </div> --}}
              </div>
              <!-- /.card -->
  
              
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection