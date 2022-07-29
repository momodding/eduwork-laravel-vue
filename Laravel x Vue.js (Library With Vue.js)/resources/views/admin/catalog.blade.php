@extends('layouts.admin')
@section('header', 'Catalog')

@section('css')

@endsection

@section('content')
<div id="controller">
  <div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" data-target="modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Catalog</a>
              </div>
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th width="30px" class="text-center">No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Total Books</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($catalogs as $key => $catalog)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $catalog->name }}</td>
                      <td class="text-center">{{ count($catalog->books) }}</td>
                      <td class="text-center">
                        <a href="#" @click="editData({{ $catalog }})" class="btn btn-warning btn-sm" style="width: 100px">Edit</a>
                        <a href="#" @click="deleteData({{ $catalog->id }})" class="btn btn-danger btn-sm" style="width: 100px">Delete</a>
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
                                
                                  <h4 class="modal-title">Catalog</h4>

                                  <button type="button" class="close" data-dismiss='modal' aria-label='close'>
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    @csrf

                                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" :value="data.name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Books</label>
                                        <input type="text" class="form-control" name="email" :value="data.totalBooks" required="">
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
                actionUrl : '{{ url('catalogs') }}',
                editStatus : false
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    console.log('addCatalog');
                    this.data = {};
                    this.actionUrl = '{{ url('catalogs') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('catalogs') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('catalogs') }}'+'/'+id;
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