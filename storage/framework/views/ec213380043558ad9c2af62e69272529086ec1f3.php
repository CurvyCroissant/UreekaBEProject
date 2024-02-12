

<?php $__env->startSection('container'); ?>

    <h1 class="mb-4">Catalog</h1>
    <br>

    <?php if(count($items) > 0): ?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-4">
                <h4>
                    <li><strong><a href="/display-item/<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></a></strong></li>
                </h4>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>There are no Items at the moment.</p>
        <p>Only <strong>admins</strong> can edit.</p>
    <?php endif; ?>

    <br>
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isAdmin()): ?>
            <a href="<?php echo e(url('/create-item')); ?>" class="btn btn-success">Create New Item</a>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/library.blade.php ENDPATH**/ ?>