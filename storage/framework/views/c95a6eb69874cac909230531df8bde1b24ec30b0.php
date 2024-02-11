

<?php $__env->startSection('container'); ?>
    <img src="<?php echo e(asset('storage/images/' . $book->image)); ?>" alt="&nbsp;&nbsp;'<?php echo e($book->name); ?>' Image">
    <br>
    <br>
    <p><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo e($book['name']); ?></p>
    <p><strong>Category&nbsp;&nbsp;: </strong><?php echo e($book->genre->name); ?></p>
    <p><strong>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>Rp.<?php echo e($book['price']); ?>,00.</p>
    <p><strong>Quantity&nbsp;&nbsp;&nbsp;: </strong><?php echo e($book['quantity']); ?></p>
    <br>

    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isAdmin()): ?>
            <a href="/edit-item/<?php echo e($book->id); ?>"><button type="button" class="btn btn-warning mt-2">Edit</button></a>
            <br>
            <br>
            <form action="/delete-item/<?php echo e($book->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to DELETE?')">Delete</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <h2 class="mt-5">Bought By:</h2>
    <ul>
        <?php $__currentLoopData = $book->customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($customer->name); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/displayBook.blade.php ENDPATH**/ ?>