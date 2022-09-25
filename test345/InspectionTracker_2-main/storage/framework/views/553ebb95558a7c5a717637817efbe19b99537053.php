<!doctype html>
<html lang="en">
<head>
    <?php
        $settings = \App\Models\Setting::find(1)
    ?>
    <base href="<?php echo e(url('/')); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | <?php echo e($settings->title); ?></title>
	<meta name="description" content="">
	<!-- General CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/chosen/bootstrap-chosen.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/global.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(url('public/storage/uploads')."/".$settings->favicon); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(url('public/storage/uploads')."/".$settings->favicon); ?>" type="image/x-icon">
	</head>
<body>

    <?php echo $__env->yieldContent('content'); ?>

	<!-- General JS Scripts -->
	<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/parsley.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/chosen.jquery.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\fiverr\resources\views//auth/layouts/app.blade.php ENDPATH**/ ?>