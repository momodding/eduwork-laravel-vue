@extends('layouts.admin')
@section('header', 'Transaction Detail')

@section('css')

@endsection

@section('content')
<div id="controller">
  <div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="#" @click="addData()" data-target="modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Transaction Detail</a>
              </div>
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th width="30px" class="text-center">No.</th>
                      <th class="text-center">Transaction ID</th>
                      <th class="text-center">Book ID</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">ISBN</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transaction_details as $key => $transaction_detail)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-center">{{ $transaction_detail->transaction_id }}</td>
                      <td class="text-center">{{ $transaction_detail->book_id }}</td>
                      <td class="text-center">{{ $transaction_detail->qty }}</td>
                      <td class="text-center">{{ $transaction_detail->isbn }}</td>
                      <td class="text-center">
                        <a href="#" @click="editData({{ $transaction_detail }})" class="btn btn-warning btn-sm" style="width: 100px">Edit</a>
                        <a href="#" @click="deleteData({{ $transaction_detail->id }})" class="btn btn-danger btn-sm" style="width: 100px">Delete</a>
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
                                
                                  <h4 class="modal-title">Transaction Detail</h4>

                                  <button type="button" class="close" data-dismiss='modal' aria-label='close'>
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    @csrf

                                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                    <div class="form-group">
                                        <label>Transaction ID</label>
                                        <input type="text" class="form-control" name="transaction_id" :value="data.transaction_id" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Book ID</label>
                                        <input type="text" class="form-control" name="book_id" :value="data.book_id" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>Quantity</label>
                                      <input type="text" class="form-control" name="qty" :value="data.qty" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>ISBN</label>
                                      <input type="text" class="form-control" name="isbn" :value="data.isbn" required="">
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
                actionUrl : '{{ url('transaction_details') }}',
                editStatus : false
            },
            mounted: function () {

            },
            methods: {
                addData() {
                    console.log('addTransaction_details');
                    this.data = {};
                    this.actionUrl = '{{ url('transaction_details') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(data) {
                    this.data = data;
                    this.actionUrl = '{{ url('transaction_details') }}'+'/'+data.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('transaction_details') }}'+'/'+id;
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