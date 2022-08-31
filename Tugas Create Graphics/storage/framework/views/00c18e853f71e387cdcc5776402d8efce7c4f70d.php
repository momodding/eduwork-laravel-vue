
<?php $__env->startSection('header', 'Author'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="controller">
<div class="row">
    <div class="col-12">
      <div class="card">
              <div class="card-header">
                <a href="<?php echo e(url('authors/create')); ?>" data-target="modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Author</a>
              </div>
              
              <div class="card-body p-0">
                <table id="example2" class="table table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center"><?php echo e($key+1); ?></td>
                      <td class="text-center"><?php echo e($author->name); ?></td>
                      <td class="text-center"><?php echo e($author->email); ?></td>
                      <td class="text-center"><?php echo e($author->phone_number); ?></td>
                      <td class="text-center"><?php echo e($author->address); ?></td>
                      <td class="text-center"><?php echo e(date('H:i:s | d/M/Y', strtotime($author->created_at))); ?></td>
                      <td class="text-center">
                        <a href="<?php echo e(url('authors/'.$author->id.'/edit')); ?>" class="btn btn-warning btn-sm" style="width: 100px">Edit</a> <br><br>
                      
                      <form action="<?php echo e(url('authors', ['id' => $author->id])); ?>" method="post">
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

            <div class="modal fade" id="modal-default">
                  <div class="modal-dialog">
                      <div class="mobile-content">
                          <form method="post" action="<?php echo e(url('authors')); ?>" autocomplete="off">
                              <div class="modal-header">
                                
                                  <h4 class="modal-title">Author</h4>

                                  <button type="button" class="close" data-dismiss='modal' aria-label='close'>
                                      <span aria-hidden="true">&times</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>Phone Number</label>
                                      <input type="text" class="form-control" name="phone_number" value="" required="">
                                    </div>
                                    <div class="form-group">
                                      <label>Address</label>
                                      <input type="text" class="form-control" name="address" value="" required="">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss='modal'>Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                          </form>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\library\resources\views/admin/author/index.blade.php ENDPATH**/ ?>