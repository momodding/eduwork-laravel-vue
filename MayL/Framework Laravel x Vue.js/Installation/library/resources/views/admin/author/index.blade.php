@extends('layouts.admin')
@section('header', 'Author')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <a href="{{ url('authors/create') }}" class="btn btn-primary pull-right">Create New Author</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $key => $author)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $author->name }}</td>
                                
                                <td>
                                  <a href="{{ url('authors/'.$author->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                  <form action="{{ url('authors', ['id' => $author->id]) }}" method="post">
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