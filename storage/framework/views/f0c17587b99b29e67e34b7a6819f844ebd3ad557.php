<title>Dashboard | Dirtless</title>

<?php $__env->startSection('content'); ?>
		<h2 class="text-center mt-lg-3">Selamat Datang <?php echo e(auth()->user()->nama); ?></h2>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/dashboard.blade.php ENDPATH**/ ?>