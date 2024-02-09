

<?php $__env->startSection('container'); ?>

<h1>Name: <?php echo e($customer->name); ?></h1>

<h2>Bought: </h2>
<ul>
<?php $__currentLoopData = $customer->book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($book->title); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus ROG G14\coding\Praetorian\Laravel\lntclass_a\resources\views/customer.blade.php ENDPATH**/ ?>