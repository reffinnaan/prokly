<?php $__env->startSection('judul','Form Edit Member'); ?>
<?php $__env->startSection('atribut'); ?><h1>Data Member</h1><br/><a href="/data/logout">Logout</a><br/><?php $__env->stopSection(); ?>
<?php $__env->startSection('cl','box'); ?>
<?php $__env->startSection('isi'); ?>
	<a href="/data/data"><< Kembali</a><br/><br/>
	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
	$slc='';
    $sld='';
    $df='selected';
	if($y->gen=='P'){
		$slc='selected';
		$sld='';
		$df='';
	}else if($y->gen=='W'){
		$sld='selected';
		$slc='';
		$df='';
	}
	?>
	<form action="/data/updated" method="POST" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

		<table>
			<tr><td><input type="hidden" name="id" value="<?php echo e($y->uid); ?>"></td><td><input type="hidden" name="namefile" value="<?php echo e($y->namefile); ?>"></td><td><input type="hidden" name="img" value="<?php echo e($y->foto); ?>"></td></tr>
			<tr><td>Nama</td><td> : </td><td><input type="text" name="nama" value="<?php echo e($y->nama); ?>" required="required"></td></tr>
			<tr><td>Password</td><td> : </td><td><input type="password" value="<?php echo e($y->pswrd); ?>" name="password" required="required"></td></tr>
			<tr><td>Email</td><td> : </td><td><input type="text" name="email" value="<?php echo e($y->email); ?>" required="required"></td></tr>
			<tr><td>Date Of Birth</td><td> : </td><td><input type="date" value="<?php echo e($y->dateofbirth); ?>" name="dateofbirth" required="required"></td></tr>
			<tr><td>No Telp</td><td> : </td><td><input type="text" name="notelp" value="<?php echo e($y->notelp); ?>" required="required"></td></tr>
			<!--<tr><td>Gender</td><td> : </td><td><select name="gender" required="required"><option value="" .<?php echo e($df); ?>.>Pilih</option><option value="P" .<?php echo e($slc); ?>.>P</option><option value="W" .<?php echo e($sld); ?>.">W</option></select></td></tr>-->
			<tr><td>Gender</td><td> : </td><td><select name="gender" required="required"><option value="" <?php echo e($df); ?>>Pilih</option><option value="P" <?php echo e($slc); ?>>P</option><option value="W" <?php echo e($sld); ?>>W</option></select></td></tr>
			<tr><td>Gambar</td><td> : </td><td><input type="file" name="file"></td></tr>
			<tr><td><input type="submit" value="Simpan Data"></td></tr>
		</table>
	</form>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prokly\resources\views/update.blade.php ENDPATH**/ ?>