


<?php $__env->startSection('container'); ?>

<h1>Create Genre</h1>

<form action = "/store-genre" method = "POST" class="mt-5">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Genre Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "name" value = "<?php echo e(old('name')); ?>">
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus ROG G14\coding\Praetorian\Laravel\lntclass_a\resources\views/createGenre.blade.php ENDPATH**/ ?>