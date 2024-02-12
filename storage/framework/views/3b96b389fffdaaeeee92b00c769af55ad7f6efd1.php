

<?php $__env->startSection('container'); ?>
    <h1 class="mb-4">Cart</h1>
    <br>

    <h3>Items:</h3>
    <ul>
        <?php $__empty_1 = true; $__currentLoopData = $cart->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li><strong>- <?php echo e($item->name); ?></strong></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li>Your cart is currently empty..</li>
        <?php endif; ?>
    </ul>

    <br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/cartDisplay.blade.php ENDPATH**/ ?>