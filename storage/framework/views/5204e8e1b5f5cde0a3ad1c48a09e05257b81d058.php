<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ms-5">
          <a class="navbar-brand" href="/">PT Meksiko</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link <?php echo e(($title === 'Library')? 'active' : ''); ?>" href="<?php echo e(route('library')); ?>">Library</a>
              </li>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
              <li class="nav-item">
                <a class="nav-link <?php echo e(($title === 'Genres')? 'active' : ''); ?>" href="/genres">Genres</a>
              </li>
              <?php endif; ?>

            </ul>
            <ul class="navbar-nav ms-auto me-5">
              <?php if(auth()->guard()->check()): ?>
              <li class="nav-item">
                <form action="/logout" method="post">
                <?php echo csrf_field(); ?>
                <a class="nav-link"><button type="submit" class="btn btn-dark"><i class="bi bi-box-arrow-right me-1"></i>Logout</button></a>
                </form>
              </li>
              <?php else: ?>
              <li class="nav-item">
                <a href='/login' class="nav-link"><button class="btn btn-dark"><i class="bi bi-box-arrow-in-right me-1"></i></i>Login</button></a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>

      
      <div class="container mt-5">
        <?php echo $__env->yieldContent('container'); ?>
      </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html><?php /**PATH C:\CODING\(BINUS) Programs\BNCC Class\BackendFP\resources\views/layouts/main.blade.php ENDPATH**/ ?>