

<?php $__env->startSection('content'); ?>

    <div class="flex flex-col" style="height: 100vh;">

        <div class="h-50 title-image-container">
            <div class="container">
                <img src="/images/ongc.png" class="ongc-logo" alt="ongc.logo">
            </div>
        </div>

        <div class="h-50 content-container d-flex">
            <div class="d-block dms-btn-container" style="flex:1">
                <a class="btn dms-btn-primary btn-block" href="/users/online"> VIEW LOGGED IN USERS </a>
                
                <a class="btn dms-btn-primary btn-block" href="/reports/total"> VIEW TOTAL DOCUMENTS </a>
                <a class="btn dms-btn-primary btn-block" href="/reports/audit"> VIEW AUDIT LOGS </a>
                <a class="btn dms-btn-primary btn-block" href="/"> EXIT </a>
            </div>
            <div style="flex:3">
                <h1 class="dms-heading" >DMS <sup>+</sup> </h1>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/reports/index.blade.php ENDPATH**/ ?>