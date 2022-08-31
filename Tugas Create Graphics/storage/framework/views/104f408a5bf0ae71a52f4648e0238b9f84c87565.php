
<?php $__env->startSection('header', 'Book'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-6">
	   <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Book</h3>
        </div>
      
          <form action="<?php echo e(url('books/'.$book->id)); ?>" method="post">
              <?php echo csrf_field(); ?>
              <?php echo e(method_field('PUT')); ?>

              
              <div class="form-group">
                    <div class="card-body">
                    <label>ISBN</label>
                    <input type="text" name="isbn" class="form-control" placeholder="Enter isbn" required="" value="<?php echo e($book->isbn); ?>">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter title" required="" value="<?php echo e($book->title); ?>">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Year</label>
                    <input type="text" name="year" class="form-control" placeholder="Enter year" required="" value="<?php echo e($book->year); ?>">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Publisher ID</label>
                    <input type="text" name="publisher_id" class="form-control" placeholder="Enter publisher_id" required="" value="<?php echo e($book->publisher_id); ?>">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Author ID</label>
                    <input type="text" name="author_id" class="form-control" placeholder="Enter author_id" required="" value="<?php echo e($book->author_id); ?>">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Catalog ID</label>
                    <input type="text" name="catalog_id" class="form-control" placeholder="Enter catalog_id" required="" value="<?php echo e($book->catalog_id); ?>">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Quantity</label>
                    <input type="text" name="qty" class="form-control" placeholder="Enter qty" required="" value="<?php echo e($book->qty); ?>">
                  </div>

                  <div class="form-group">
                    <div class="card-body">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter price" required="" value="<?php echo e($book->price); ?>">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/book/edit.blade.php ENDPATH**/ ?>