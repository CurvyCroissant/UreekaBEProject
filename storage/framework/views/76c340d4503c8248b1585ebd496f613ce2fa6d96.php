

<?php $__env->startSection('container'); ?>
    <img src="<?php echo e(asset('storage/images/' . $item->image)); ?>" alt="&nbsp;&nbsp;'<?php echo e($item->name); ?>' Image">
    <br>
    <br>
    <p><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo e($item['name']); ?></p>
    <p><strong>Category&nbsp;&nbsp;: </strong><?php echo e($item->category->name); ?></p>
    <p><strong>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>Rp.<?php echo e($item['price']); ?>,00.</p>
    <p><strong>Quantity&nbsp;&nbsp;&nbsp;: </strong><?php echo e($item['quantity']); ?></p>
    <br>

    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isAdmin()): ?>
            <a href="/edit-item/<?php echo e($item->id); ?>"><button type="button" class="btn btn-warning mt-2">Edit</button></a>
            <br>
            <br>
            <form action="/delete-item/<?php echo e($item->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to DELETE?')">Delete</button>
            </form>
        <?php endif; ?>

        <br>

        <?php if(auth()->check() && $cart): ?>
            <form action="<?php echo e(route('cart.store', $cart->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        <?php elseif(auth()->check() && !$cart): ?>
            <p>You don't have a cart. Please create one to add items.</p>
        <?php else: ?>
            <p>Please log in to add items to your cart.</p>
        <?php endif; ?>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/displayItem.blade.php ENDPATH**/ ?>