

<?php $__env->startSection('container'); ?>
    <h1>Welcome to Lebron's Library!</h1>
    <br>

    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isAdmin()): ?>
            <div>
                <h4>Greetings <?php echo e(auth()->user()->admin_id); ?>!</h4>
            </div>
        <?php else: ?>
            <div>
                <h4>Greetings <?php echo e(auth()->user()->name); ?>!</h4>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div>
            <h4>Login to access website features.</h4>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\Ureeka\UreekaBEProject\resources\views/welcome.blade.php ENDPATH**/ ?>