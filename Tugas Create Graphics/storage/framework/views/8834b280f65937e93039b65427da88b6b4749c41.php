
<?php $__env->startSection('header', 'Book'); ?>

<?php $__env->startSection('content'); ?>
<div id="controller">
<div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="<?php echo e(url('books/create')); ?>" class="btn btn-sm btn-primary pull-right">Create New Book</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="text-center">No.</th>
                      <th class="text-center">ISBN</th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Year</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center"><?php echo e($key+1); ?></td>
                      <td class="text-center"><?php echo e($book->isbn); ?></td>
                      <td class="text-center"><?php echo e($book->title); ?></td>
                      <td class="text-center"><?php echo e($book->year); ?></td>
                      <td class="text-center"><?php echo e($book->qty); ?></td>
                      <td class="text-center"><?php echo e($book->price); ?></td>
                      <td class="text-center"><?php echo e(date('H:i:s | d/M/Y', strtotime($book->created_at))); ?></td>
                      <td class="text-center">
                        <a href="<?php echo e(url('books/'.$book->id.'/edit')); ?>" class="btn btn-warning btn-sm" style="width: 100px">Edit</a> <br><br>
                      
                      <form action="<?php echo e(url('books', ['id' => $book->id])); ?>" method="post">
                          <input class="btn btn-danger btn-sm" style="width: 100px" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                          <?php echo method_field('delete'); ?>
                          <?php echo csrf_field(); ?>
                      </form>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>

            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div> -->
            </div>
          </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/book/index.blade.php ENDPATH**/ ?>