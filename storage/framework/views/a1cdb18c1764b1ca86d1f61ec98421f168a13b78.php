

<?php $__env->startSection('container'); ?>
    <h1 class="mb-4">Invoice Display</h1>
    <br>

    <h3>Invoice ID: <?php echo e($invoice->id); ?></h3>
    <br>

    <h2>Items</h2>
    <?php $__empty_1 = true; $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-4">
            <ul>
                <li><strong><?php echo e($item->name); ?></strong></li>
                <ul>
                    <li>Category&nbsp;&nbsp;: <?php echo e($item->category->name); ?></li>
                    <li>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?php echo e($item->price); ?>,00.</li>
                    <li>Quantity&nbsp;&nbsp;&nbsp;: <?php echo e($item->pivot->quantity); ?></li>
                    <li>Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <img src="<?php echo e($item->image); ?>"
                            alt="&nbsp;&nbsp;'<?php echo e($item->name); ?>' Image" height="50"></li>
                </ul>
            </ul>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No items found in the cart.</p>
    <?php endif; ?>

    <ul>
        <li><strong>Sender Address&nbsp;:</strong> <?php echo e($invoice->sender_address); ?></li>
        <li><strong>Post Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
            <?php echo e($invoice->post_code); ?></li>
        <li><strong>Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
            <?php echo e($invoice->subtotal); ?></li>
        <li><strong>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
            <?php echo e($invoice->total); ?></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/invoiceDisplay.blade.php ENDPATH**/ ?>