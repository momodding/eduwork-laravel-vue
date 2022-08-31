
<?php $__env->startSection('header', 'Transaction Detail'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Transaction Detail</h3>
        </div>
      
          <form action="<?php echo e(url('transaction_details')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                  <div class="card-body">
                    <label>Transaction ID</label>
                    <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Book ID</label>
                    <input type="text" name="book_id" class="form-control" placeholder="Enter Book ID" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Quantity</label>
                    <input type="text" name="qty" class="form-control" placeholder="Enter Quantity" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" placeholder="Enter ISBN" required="">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/transaction_detail/create.blade.php ENDPATH**/ ?>