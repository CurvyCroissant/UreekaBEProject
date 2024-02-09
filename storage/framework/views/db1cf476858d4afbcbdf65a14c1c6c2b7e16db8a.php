

<?php $__env->startSection('container'); ?>


<img src="<?php echo e(asset('/storage/book_images/'.$book->image)); ?>" alt="<?php echo e($book->title); ?> Cover">
<h2>Book Title: <?php echo e($book['title']); ?></h2>
<h3>Book Genre: <?php echo e($book->genre->name); ?></h3>
<p>Author: <?php echo e($book['author']); ?></p>
<p>Description: <?php echo e($book['description']); ?></p>

<form action="/delete-book/<?php echo e($book->id); ?>" method = "POST">
<?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>
<button type="submit" class="btn btn-danger" onclick = "return confirm('Are you sure you want to delete?')">Delete</button>
</form>

<a href="/edit-book/<?php echo e($book->id); ?>"><button type="button" class="btn btn-warning mt-2">Edit</button></a>

<h2 class="mt-5">Bought By:</h2>
<ul>
<?php $__currentLoopData = $book->customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li><?php echo e($customer->name); ?></li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus ROG G14\coding\Praetorian\Laravel\lntclass_a\resources\views/displayBook.blade.php ENDPATH**/ ?>