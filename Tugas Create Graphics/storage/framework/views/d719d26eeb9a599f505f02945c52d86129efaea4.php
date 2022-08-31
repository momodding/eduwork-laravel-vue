
<?php $__env->startSection('header', 'Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Member</h3>
        </div>
      
          <form action="<?php echo e(url('members/'.$member->id)); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo e(method_field('PUT')); ?>

              
              <div class="form-group">
                  <div class="card-body">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required="" value="<?php echo e($member->name); ?>">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Gender</label>
                    <input type="text" name="gender" class="form-control" placeholder="Enter Gender" required="" value="<?php echo e($member->gender); ?>">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" required="" value="<?php echo e($member->phone_number); ?>">
                  </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" required="" value="<?php echo e($member->address); ?>">
                  </div>
              </div>

              <div class="form-group">
                  <div class="card-body">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required="" value="<?php echo e($member->email); ?>">
                  </div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/member/edit.blade.php ENDPATH**/ ?>