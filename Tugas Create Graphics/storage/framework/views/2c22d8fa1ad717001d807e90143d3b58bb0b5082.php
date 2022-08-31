
<?php $__env->startSection('header', 'Publisher'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Publisher</h3>
        </div>
      
          <form action="<?php echo e(url('publishers')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                  <div class="card-body">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" required="">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required="">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/publisher/create.blade.php ENDPATH**/ ?>