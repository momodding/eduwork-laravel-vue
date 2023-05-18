@extends('layouts.admin')
@section('header', 'Transaction Detail')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
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
                    <label class="col-sm-2 col-form-label">Buku</label>
                    <div class="col-sm-10">
                            {{ $transactions->title }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        {{ $transactions->status }}
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-default float-right" href="{{ url('transactions/') }}">Close</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
@section('js')

@endsection
