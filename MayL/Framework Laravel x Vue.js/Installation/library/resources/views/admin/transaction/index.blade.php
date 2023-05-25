@extends('layouts.admin')
@section('header', 'Transaction')

@section('content')
    <!-- Main content -->
      <div id="controller">
        <div class="container-fluid">
          <div class="row">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <a href="{{ url('transactions/create') }}" class="btn btn-primary pull-right">Create New Transaction</a>
                
                  <select v-model="selectedStatus">
                    <option value="0">Belum dikembalikan</option>
                    <option value="1">sudah dikembalikan</option>
                  </select>
                  
                  <select name="filterTanggal" id="">
                    <option value="1">Peminjaman terbaru</option>
                    <option value="2">Peminjaman terlama</option>
                  </select>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered" id="dataTable">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Nama Peminjam</th>
                        <th>Lama Pinjam (hari)</th>
                        <th>Total Buku</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($transactions as $key => $transaction)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ convert_date($transaction->date_start) }}</td>
                                <td>{{ convert_date($transaction->date_end) }}</td>
                                <td>{{ $transaction->name }}</td>
                                <td>{{ $transaction->title }}</td>
                                <td>{{ $transaction->qty }}</td>
                                <td>{{ $transaction->price * $transaction->qty }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>
                                  <a href="{{ url('catalogs/'.$transaction->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                  <form action="{{ url('catalogs', ['id' => $transaction->id]) }}" method="post">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Areyou sure?')">
                                    @method('delete')
                                    @csrf
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> --}}
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      <!-- /.content -->
@endsection

@section('js')
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
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';

    var columns = [
            {data: 'DT_RowIndex', class: 'text-center', oderable: true},
            {data: 'date_start', class:'text-center', orderable:true},
            {data: 'date_end', class:'text-center', orderable:true}, 
            {data: 'name', class:'text-center', orderable:true},
            {data: 'title', class:'text-center', orderable:false},
            {data: 'qty', class:'text-center', orderable:false},
            {data: 'rentPrice', class:'text-center', orderable:false,
              render: function(data, type, row, meta){
                return`Rp ${row.rentPrice}`
              }},
            {data: 'status', class:'text-center', orderable:false,
              render: function(data, type, row, meta){
                if(row.status == 1){
                    return `<a>Sudah Dikembalikan</a>`;
                }
                else {
                    return `<a>Belum Dikembalikan</a>`;
                }
            }},
            {render: function(index, row, data, meta){
              
                return`
                    <a class="btn btn-primary btn-sm" onclick="controller.detail(
                        ${data.id})">
                        Detail
                    </a>
                    <a href="#" class="btn btn-warning btn-sm" onclick="controller.edit(
                        ${data.id})">
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(
                        ${data.id})">
                        Delete
                    </a>`;
            }, orderable: false, width: '200px', class:'text-center'},
        ];
            
        var controller = new Vue({
    el: '#controller',
    data: {
        datas:[],
        selectedStatus:'',
        data: {},
        actionUrl,
        apiUrl,
        editStatus:false,
    },
    mounted: function () {
        this.datatable();
    },
    methods:{
        datatable(){
            const _this = this;
            _this.table = $('#dataTable').DataTable({
                ajax:{
                    url: _this.apiUrl,
                    type : 'GET',
                },
                columns: columns
            }).on('xhr', function(){
                _this.datas = _this.table.ajax.json().data;
            });
        },
        detail(row){
          //console.log("menuju detail ke - "+ row);
          this.actionUrl = '{{ url('transaction_details') }}' + '/' +row;
            location.href = this.actionUrl;
        },
        edit(row){
          //console.log("menuju detail ke - "+ row);
          this.actionUrl = '{{ url('transaction_edit') }}' + '/' +row;
            location.href = this.actionUrl;
        },
        deleteData(id){
          console.log(id);
          if (confirm("Are you sure?")) {

            axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
              location.reload();
            });
          }
        },
        numberWithSpaces(x){
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
    },
    computed:{
        filteredStatus(){
          return this.datas.filter(data =>{
            return data.status === this.selectedStatus;
            }, this);
          }
        }
});
</script>
{{-- <script src="{{ asset('js/data.js') }}"></script> --}}
@endsection