

<?php $__env->startSection('container'); ?>
<h1>About Page</h1>
<h3>Nama: <?php echo e($name); ?></h3>
<p>Email: <?php echo e($email); ?></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\FINAL_LnT_ClassA\resources\views/about.blade.php ENDPATH**/ ?>