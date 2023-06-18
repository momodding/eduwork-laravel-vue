@extends('layouts.admin')
@section('header', 'Transaction Detail')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info" id="controller">
        <div class="card-header">
            <h3 class="card-title">Transaction Detail</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Member</label>
                    <div class="col-sm-10">
                        {{ $transactions->name }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Peminjam</label>
                    <div class="col-sm-10">
                        {{ $transactions->date_start }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                            {{ $transactions->title }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lama Pinjam (hari)</label>
                    <div class="col-sm-10">
                            {{ $transactions->dayrent }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        {{-- {{ $transactions->status }} --}}
                        @if($transactions->status==0)
                            <label>Belum dikembalikan</label>
                        @else
                            <label>Sudah dikembalikan</label>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-default float-right" action="action"
                onclick="window.history.go(-1); return false;"
                type="submit"
                value="Cancel">Close</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
@section('js')
<script type="text/javascript">
    var actionUrl = '{{ url('transactions') }}';

    var app = new Vue({
  el: '#controller',
  data: {
    actionUrl,
    },
    methods:{
        back(){
            console.log("sudah diklik")
            location.href = this.actionUrl;
        }
    }
})

</script>
@endsection
