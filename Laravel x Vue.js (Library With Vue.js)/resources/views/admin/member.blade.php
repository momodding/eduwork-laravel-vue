@extends('layouts.admin')
@section('header', 'Member')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
  <div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" data-target="modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Member</a>
              </div>
              <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th width="30px" class="text-center">No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Gender</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($members as $key => $member)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $member->name }}</td>
                      <td class="text-center">{{ $member->gender }}</td>
                      <td class="text-center">{{ $member->phone_number }}</td>
                      <td class="text-center">{{ $member->address }}</td>
                      <td class="text-center">{{ $member->email }}</td>
                      <td class="text-center">
                        <a href="#" @click="editData({{ $member }})" class="btn btn-warning btn-sm" style="width: 100px">Edit</a>
                        <a href="#" @click="deleteData({{ $member->id }})" class="btn btn-danger btn-sm" style="width: 100px">Delete</a>
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
                                
                                  <h4 class="modal-title">Member</h4>

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
                                        <label>Gender</label>
                                        <input type="text" class="form-control" name="gender" :value="data.gender" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" :value="data.address" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" :value="data.email" required="">
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
<!-- Datatables & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
    $("#datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
<!-- CRUD Vue js -->
    <script type="text/javascript">
        var controller = new Vue ({
            el: '#controller',
            data: {
                data : {},
                actionUrl : '{{ url('members') }}',
                editStatus : false
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    console.log('addMember');
                    this.data = {};
                    this.actionUrl = '{{ url('members') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('members') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('members') }}'+'/'+id;
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