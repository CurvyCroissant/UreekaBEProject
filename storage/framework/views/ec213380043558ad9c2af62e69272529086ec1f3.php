

<?php $__env->startSection('container'); ?>

    <h1 class="mb-4">Catalog</h1>
    <br>

    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-4">
            <h4><strong>- <a href="/display-item/<?php echo e($book['id']); ?>"><?php echo e($book['name']); ?></strong></h4></a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <br>
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isAdmin()): ?>
            <a href="<?php echo e(url('/create-item')); ?>" class="btn btn-success">Create New Item</a>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/library.blade.php ENDPATH**/ ?>