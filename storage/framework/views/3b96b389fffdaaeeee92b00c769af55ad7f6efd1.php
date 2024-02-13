

<?php $__env->startSection('container'); ?>
    <h1 class="mb-4">Cart</h1>
    <br>

    <?php if($cartData && $cartData->isNotEmpty()): ?>
        <a href="/create-invoice/<?php echo e($cart['id']); ?>" class="btn btn-dark">Invoice</a>
        <br>
    <?php endif; ?>
    <br>
    <h3>Items:</h3>
    <br>
    <?php $__empty_1 = true; $__currentLoopData = $cart->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-4">
            <ul>
                <li><strong><?php echo e($item->name); ?></strong></li>
                <ul>
                    <li>Category&nbsp;&nbsp;: <?php echo e($item->category->name); ?></li>
                    <li>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?php echo e($item->price); ?>,00.</li>
                    <li>Quantity&nbsp;&nbsp;&nbsp;: <?php echo e($item->quantity); ?></li>
                    <li>Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <img src="<?php echo e($item->image); ?>"
                            alt="&nbsp;&nbsp;'<?php echo e($item->name); ?>' Image" height="50"></li>
                </ul>
            </ul>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>Your cart is currently empty.</p>
    <?php endif; ?>

    <br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/cartDisplay.blade.php ENDPATH**/ ?>