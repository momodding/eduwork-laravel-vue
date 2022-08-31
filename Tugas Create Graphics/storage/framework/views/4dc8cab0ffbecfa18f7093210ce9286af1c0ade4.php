
<?php $__env->startSection('header', 'Transaction'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Transaction</h3>
        </div>
      
          <form action="<?php echo e(url('transactions')); ?>" method="post">
              <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <div class="card-body">
                    <label>Member ID</label>
                    <input type="text" name="member_id" class="form-control" placeholder="Enter Member ID" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Date Start</label>
                    <input type="text" name="date_start" class="form-control" placeholder="Enter Date Start" required="">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Date End</label>
                    <input type="text" name="date_end" class="form-control" placeholder="Enter Date End" required="">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/transaction/create.blade.php ENDPATH**/ ?>