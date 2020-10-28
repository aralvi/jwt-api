<?php $__env->startSection('title', 'Add New Permission'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- ROW 1 -->
    <div class="row">
        <div class="col-md-12">
            <h2 style="margin-top:4px;">Add New Permision</h2>
        </div>
    </div>
    <!-- END ROW 1 -->
    <br />
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(url('permisions/store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="admin-details">
                    <div class="form-row">

                        <div class="col-lg-12">
                            <div class="form-group">
                              <label for="permission">Permission*</label>
                              <input type="text" class="form-control" id="permission" name="permission" placeholder="Enter Name" value="<?php echo e(old('permission')); ?>" autocomplete="last_name">
                            </div>
                        </div>
                    </div>


                </div>
                <button type="reset" class="btn btn-secondary btn-md"><i class="fas fa-redo-alt"></i> Reset Form</button>
                <button type="submit" class="btn btn-primary btn-md"><i class="fas fa-check-circle"></i> Save</button>
            </form>
        </div>
      </div>
    </div>
    
<!-- END CONTIANER FLUID -->
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\orify\jwt-api\resources\views\admin\permissions\create.blade.php ENDPATH**/ ?>