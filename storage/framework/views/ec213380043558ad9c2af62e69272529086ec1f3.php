

<?php $__env->startSection('container'); ?>


<h1>Library</h1>
<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<br>
<a href="/display-book/<?php echo e($book['id']); ?>"><h2>Book Title: <?php echo e($book['title']); ?></h2></a>
<p>Author: <?php echo e($book['author']); ?></p>
<p>Description: <?php echo e($book['description']); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/library.blade.php ENDPATH**/ ?>