<?php $__env->startSection('judul','Login'); ?>
<?php $__env->startSection('atribut',''); ?>
<?php $__env->startSection('cl','log'); ?>
<?php $__env->startSection('isi'); ?>
	<?php if($message = Session::get('delete')): ?>
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong><?php echo e($message); ?></strong>
		</div>
	<?php endif; ?>
	<form method="post" action="/data/auth">
		<?php echo e(csrf_field()); ?>

		<div class="form-group">
			<label>Enter Email</label>
			<input type="email" name="email" class="form-control" required="required"/>
		</div>
		<div class="form-group">
			<label>Enter Password</label>
			<input type="password" name="password" class="form-control" required="required"/>
		</div>
		<div class="form-group">
			<input type="submit" name="login" class="btn-primary" value="Login" />
		</div>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prokly\resources\views/login.blade.php ENDPATH**/ ?>