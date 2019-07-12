<!DOCTYPE html>
<html>
	<head>
		<title>CRUD</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			.box{
				width:900px;
				margin:0 auto;
				padding:30px;
				border:1px solid #ccc;
			}
			.log{
				width:600px;
				margin:0 auto;
				padding:20px;
				border:3px solid #444;
			}
			.form-control{
				float:center;
				width:400px;
			}
		</style>
	</head>
	<body>
		<br/>
		<div class="<?php echo $__env->yieldContent('cl'); ?>">
			<h3><?php echo $__env->yieldContent('judul'); ?></h3>
				<?php echo $__env->yieldContent('atribut'); ?><br/>
				<?php echo $__env->yieldContent('isi'); ?>
		</div>
	</body>
</html><?php /**PATH C:\xampp\htdocs\prokly\resources\views/inti.blade.php ENDPATH**/ ?>