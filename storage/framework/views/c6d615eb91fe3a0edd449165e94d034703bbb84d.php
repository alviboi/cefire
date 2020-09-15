<?php $__env->startSection('content'); ?>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">CEFIRE VALENCIA</h1>
            <p class="lead">Aquesta pàgina és per a gestionar els horaris del centre del CEFIRE de València. A continuació teniu els enllaços per a accedir als diferents recursos.</p>
            <hr class="my-4">
            <p>Pots accedir clickant al següent botó. O desde el menú Acceder.</p>
            <a class="btn btn-primary btn-lg" href="<?php echo e(route('login')); ?>" role="button">Accedeix</a>
        </div>
    </div>
    <?php echo e($exemple ?? ''); ?>

    <buttons-component>

    </buttons-component>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/welcome.blade.php ENDPATH**/ ?>