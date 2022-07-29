@extends('layouts.admin')
@section('header', 'Book')

@section('css')

@endsection

@section('content')
<div id="controller">
  <div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" data-target="modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Book</a>
              </div>
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th width="30px" class="text-center">No.</th>
                      <th class="text-center">ISBN</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Year</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $key => $book)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $book->isbn }}</td>
                      <td class="text-center">{{ $book->title }}</td>
                      <td class="text-center">{{ $book->year }}</td>
                      <td class="text-center">{{ $book->qty }}</td>
                      <td class="text-center">{{ $book->price }}</td>
                      <td class="text-center">
                        <a href="#" @click="editData({{ $book }})" class="btn btn-warning btn-sm" style="width: 100px">Edit</a>
                        <a href="#" @click="deleteData({{ $book->id }})" class="btn btn-danger btn-sm" style="width: 100px">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        
        <div class="modal fade" id="modal-default">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <form method="post" :action="actionUrl" autocomplete="off">
                              <div class="modal-header">
                                
                                  <h4 class="modal-title">Book</h4>

                                  <button type="button" class="close" data-dismiss='modal' aria-label='close'>
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    @csrf

                                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input type="text" class="form-control" name="isbn" :value="data.isbn" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" :value="data.title" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>Year</label>
                                      <input type="text" class="form-control" name="year" :value="data.year" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>Quantity</label>
                                      <input type="text" class="form-control" name="qty" :value="data.qty" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>Price</label>
                                      <input type="text" class="form-control" name="price" :value="data.price" required="">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss='modal'>Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                          </form>
                      </div>
                  </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        var controller = new Vue ({
            el: '#controller',
            data: {
                data : {},
                actionUrl : '{{ url('books') }}',
                editStatus : false
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    console.log('addBook');
                    this.data = {};
                    this.actionUrl = '{{ url('books') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('books') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('books') }}'+'/'+id;
                    if (confirm("Are you sure?")) {
                        axios.post(this.actionUrl, {_method: "DELETE"}).then(response => {
                            location.reload();
                        });
                    }
                }
            }
          });
    </script>
@endsection