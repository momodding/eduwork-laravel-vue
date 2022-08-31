
<?php $__env->startSection('header', 'Publisher'); ?>

<?php $__env->startSection('content'); ?>
	<div id="controller">
<div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="<?php echo e(url('publishers/create')); ?>" class="btn btn-sm btn-primary pull-right">Create New Publisher</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="text-center">No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center"><?php echo e($key+1); ?></td>
                      <td class="text-center"><?php echo e($publisher->name); ?></td>
                      <td class="text-center"><?php echo e($publisher->email); ?></td>
                      <td class="text-center"><?php echo e($publisher->phone_number); ?></td>
                      <td class="text-center"><?php echo e($publisher->address); ?></td>
                      <td class="text-center"><?php echo e(date('H:i:s | d/M/Y', strtotime($publisher->created_at))); ?></td>
                      <td class="text-center">
                        <a href="<?php echo e(url('publishers/'.$publisher->id.'/edit')); ?>" class="btn btn-warning btn-sm" style="width: 100px">Edit</a> <br><br>
                      
                      <form action="<?php echo e(url('publishers', ['id' => $publisher->id])); ?>" method="post">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/publisher/index.blade.php ENDPATH**/ ?>