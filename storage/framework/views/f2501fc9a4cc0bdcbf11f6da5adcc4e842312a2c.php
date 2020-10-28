<?php $__env->startSection('title', ' Profile'); ?>

<?php $__env->startSection('content'); ?>

<!-- CONTAINER FLUID -->
<div class="container-fluid">

	<!-- ROW 1 -->
    <div class="row  bg-light" style="border-radius: 10px;padding:10px;">
    	<div class="col-md-12">
    		<?php if($profile->avatar != ''): ?>
	    		<img src="<?php echo e(asset('uploads/images/user/avatars/'.$profile->avatar)); ?>" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
	    	<?php else: ?>
	    		<img src="<?php echo e(asset('uploads/images/user/avatars/default.jpg')); ?>" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
	    	<?php endif; ?>
	        <h2 style="margin-top: 10px; padding:10px;"><?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?>'s Profile</h2>
	        <form action="<?php echo e(url('/profile/change_avatar')); ?>" method="POST" enctype="multipart/form-data" style="margin-top: -15px;">
	        	<?php echo csrf_field(); ?>
	        	<label>Update Profile Image</label>
	        	<br />
	        	<input type="file" name="avatar" accept="image/png, image/jpg, image/jpeg">
	        	<button style="float: right;" type="submit" class="btn btn-sm btn-primary">Update Image</button>
	        </form>
	    </div>
    </div>
    <!-- END ROW 1 -->
    <br />

	<div class="card">
		<div class="card-body">
			<form action="<?php echo e(url('/profile')); ?>" method="POST">
				<?php echo csrf_field(); ?>
				<div class="form-group">
				  	<label for="name">Name*</label>
				  	<input id="name" name="name" type="text" class="form-control" value="<?php echo e(old('name') ?? $profile->name); ?>" autocomplete="first_name" placeholder="Enter First Name">

				</div>

				<div class="form-group">
				  	<label for="email">Email*</label>
				  	<input id="email" name="email" type="text" class="form-control" value="<?php echo e(old('email') ?? $profile->email); ?>" autocomplete="email" placeholder="Enter Email">

				</div>
				<button type="button" class="btn btn-secondary btn-md" onclick="history.back()"><i class="fas fa-hand-point-left"></i> Go Back</button>
                <button type="submit" class="btn btn-primary btn-md"><i class="far fa-check-circle"></i> Save Changes</button>
			</form>
		</div>
	</div>
	

</div>
<!--END CONTAINER FLUID-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\orify\jwt-api\resources\views\admin\profile\change_profile.blade.php ENDPATH**/ ?>