


<?php $__env->startSection('container'); ?>

<h1>Edit</h1>

<form action = "/update-item/<?php echo e($item->id); ?>" method = "POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name = "name" value = "<?php echo e(old('name', $item->name)); ?>">
      <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name = "price" value = "<?php echo e(old('price', $item->price)); ?>">
      <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mb-3">
      <label for="quantity" class="form-label">Quantity</label>
      <input type="number" class="form-control" id="quantity" name = "quantity" value = "<?php echo e(old("quantity", $item->quantity)); ?>">
      <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <button type="submit" class="btn btn-primary">Change</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/editItem.blade.php ENDPATH**/ ?>