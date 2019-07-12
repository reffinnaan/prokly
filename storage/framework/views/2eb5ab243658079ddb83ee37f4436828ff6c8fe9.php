<?php $__env->startSection('judul','Form Tambah Member'); ?>
<?php $__env->startSection('atribut'); ?><h1>Data Member</h1><br/><a href="/data/logout">Logout</a><br/><?php $__env->stopSection(); ?>
<?php $__env->startSection('cl','box'); ?>
<?php $__env->startSection('isi'); ?>
	<a href="/data/data"><< Kembali</a><br/><br/>
	<form action="/data/stored" method="POST" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

		<table>
			<tr><td>Nama</td><td> : </td><td><input type="text" name="nama" required="required"></td></tr>
			<tr><td>Password</td><td> : </td><td><input type="password" name="password" required="required"></td></tr>
			<tr><td>Email</td><td> : </td><td><input type="text" name="email" required="required"></td></tr>
			<tr><td>Date Of Birth</td><td> : </td><td><input type="date" name="dateofbirth" required="required"></td></tr>
			<tr><td>No Telp</td><td> : </td><td><input type="text" name="notelp" required="required"></td></tr>
			<tr><td>Gender</td><td> : </td><td><select name="gender" required="required"><option value="" selected>Pilih</option><option value="P">P</option><option value="W">W</option></select></td></tr>
			<tr><td>Gambar</td><td> : </td><td><input type="file" name="file"></td></tr>
			<tr><td><input type="submit" value="Simpan Data"></td><td></td><td><button type="reset">Reset</button></td></tr>
		</table>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prokly\resources\views/tambah.blade.php ENDPATH**/ ?>