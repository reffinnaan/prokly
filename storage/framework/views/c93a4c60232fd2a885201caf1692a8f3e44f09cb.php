<?php $__env->startSection('judul','Daftar Nama'); ?>
<?php $__env->startSection('atribut'); ?><h1>Data Member</h1><br/><a href="/data/logout">Logout</a><br/><?php $__env->stopSection(); ?>
<?php $__env->startSection('cl','box'); ?>
<?php $__env->startSection('isi'); ?>
	<?php if($message = Session::get('sukses')): ?>
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong><?php echo e($message); ?></strong>
		</div>
	<?php endif; ?>
	<?php if($message = Session::get('delete')): ?>
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong><?php echo e($message); ?></strong>
		</div>
	<?php endif; ?>
	<?php if($message = Session::get('update')): ?>
		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong><?php echo e($message); ?></strong>
		</div>
	<?php endif; ?>
	<a href="/data/tambah">+ Tambah Member Baru</a><br/><br/>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Date Of Birth</th>
			<th>No Telp</th>
			<th>Gender</th>
			<th>Nama File</th>
			<th>Options</th>
		</tr>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d => $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($d +1); ?></td>
			<td><?php echo e($e->nama); ?></td>
			<td><?php echo e($e->email); ?></td>
			<td><?php echo e($e->dateofbirth); ?></td>
			<td><?php echo e($e->notelp); ?></td>
			<td><?php echo e($e->gen); ?></td>
			<td><?php echo e($e->namefile); ?></td>
			<td>
				<a href="/data/edit/<?php echo e($e->uid); ?>">Update</a>
				<strong>|</strong>
				<a href="/data/hapus/<?php echo e($e->uid); ?>">Delete</a>
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prokly\resources\views//data.blade.php ENDPATH**/ ?>