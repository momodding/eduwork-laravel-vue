
<?php $__env->startSection('header', 'Catalog'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Catalog</h3>
        </div>
      
          <form action="<?php echo e(url('catalogs/'.$catalog->id)); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo e(method_field('PUT')); ?>

              
              <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required="" value="<?php echo e($catalog->name); ?>">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/catalog/edit.blade.php ENDPATH**/ ?>