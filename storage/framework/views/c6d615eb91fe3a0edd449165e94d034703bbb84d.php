<?php $__env->startSection('content'); ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">CEFIRE VALENCIA</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>
<?php echo e($exemple ?? ''); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/welcome.blade.php ENDPATH**/ ?>