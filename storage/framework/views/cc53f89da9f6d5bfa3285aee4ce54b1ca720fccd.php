

<?php $__env->startSection('container'); ?>

    <h1 class="mb-4">Categories</h1>
    <br>

    <?php if(count($categories) > 0): ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h4>
                <li><strong><a><?php echo e($category['name']); ?></a></strong></li>
            </h4>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>There are no Categories at the moment.</p>
        <p>Only <strong>admins</strong> can edit.</p>
    <?php endif; ?>

    <br>
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isAdmin()): ?>
            <a href="<?php echo e(url('/create-category')); ?>" class="btn btn-success">Create New Category</a>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/CategoriesIndex.blade.php ENDPATH**/ ?>