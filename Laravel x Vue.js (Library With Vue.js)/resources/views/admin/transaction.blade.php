@extends('layouts.admin')
@section('header', 'Transaction')

@section('css')

@endsection

@section('content')
<div id="controller">
  <div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" data-target="modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Transaction</a>
              </div>
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th width="30px" class="text-center">No.</th>
                      <th class="text-center">Member ID</th>
                      <th class="text-center">Date Start</th>
                      <th class="text-center">Date End</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transactions as $key => $transaction)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $transaction->member_id }}</td>
                      <td class="text-center">{{ $transaction->date_start }}</td>
                      <td class="text-center">{{ $transaction->date_end }}</td>
                      <td class="text-center">
                        <a href="#" @click="editData({{ $transaction }})" class="btn btn-warning btn-sm" style="width: 100px">Edit</a>
                        <a href="#" @click="deleteData({{ $transaction->id }})" class="btn btn-danger btn-sm" style="width: 100px">Delete</a>
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
                                
                                  <h4 class="modal-title">Transaction</h4>

                                  <button type="button" class="close" data-dismiss='modal' aria-label='close'>
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    @csrf

                                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                    <div class="form-group">
                                        <label>Member ID</label>
                                        <input type="text" class="form-control" name="member_id" :value="data.member_id" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Date Start</label>
                                        <input type="text" class="form-control" name="date_start" :value="data.date_start" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>Date End</label>
                                      <input type="text" class="form-control" name="date_end" :value="data.date_end" required="">
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
                actionUrl : '{{ url('transactions') }}',
                editStatus : false
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    console.log('addTransaction');
                    this.data = {};
                    this.actionUrl = '{{ url('transactions') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('transactions') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('transactions') }}'+'/'+id;
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