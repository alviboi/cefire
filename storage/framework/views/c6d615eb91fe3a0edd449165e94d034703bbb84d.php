<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="alert alert-info alert-dismissible text-center" role="alert">
            <h3>Ja teniu la part per a buscar centres i emplenar les dades de contacte operativa al final d'esta pàgina. Per
                favor ompliu la base de dades per a evitar futurs problemes si agafeu una baixa.</h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">CEFIRE VALENCIA</h1>
            <p class="lead">Aquesta pàgina és per a gestioanr els horaris del centre del CEFIRE de València</p>
            <hr class="my-4">
            <p>Pots accedir clickant al següent botó. O desde el menú Acceder.</p>
            <a class="btn btn-primary btn-lg" href="<?php echo e(route('login')); ?>" role="button">Accedeix</a>
        </div>
    </div>
    <?php echo e($exemple ?? ''); ?>

    <centres-component></centres-component>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/welcome.blade.php ENDPATH**/ ?>