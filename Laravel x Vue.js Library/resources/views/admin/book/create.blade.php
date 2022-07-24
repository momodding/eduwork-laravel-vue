@extends('layouts.admin')
@section('header', 'Book')

@section('content')
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Book</h3>
        </div>
      
          <form action="{{ url('books') }}" method="post">
              @csrf
                  <div class="form-group">
                    <div class="card-body">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" placeholder="Enter isbn" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter title" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Year</label>
                    <input type="text" name="year" class="form-control" placeholder="Enter year" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Publisher ID</label>
                    <input type="text" name="publisher_id" class="form-control" placeholder="Enter publisher_id" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Author ID</label>
                    <input type="text" name="author_id" class="form-control" placeholder="Enter author_id" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Catalog ID</label>
                    <input type="text" name="catalog_id" class="form-control" placeholder="Enter catalog_id" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Quantity</label>
                    <input type="text" name="qty" class="form-control" placeholder="Enter qty" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter price" required="">
                  </div>  
            </div>
      
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
@endsection