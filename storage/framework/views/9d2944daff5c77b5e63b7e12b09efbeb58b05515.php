<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <b>Error!</b> <?php echo e(session('error')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <b>Success!</b> <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>  <?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/templates/alert.blade.php ENDPATH**/ ?>