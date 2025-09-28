

<?php $__env->startSection('content'); ?>

<div class="container mt-fit px-0 shadow" >

    <?php echo $__env->make('templates.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card p-2 mb-4 bg-lightblue">
        <table class="table table-bordered bg-white">
            <thead class="thead-light">
                <tr>
                    <th>Sl.no</th>
                    <th>File No</th>
                    <th>Subject</th>
                    <th>Date In</th>
                    <th>Date Out</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($index + 1); ?> </td>
                        <td> <a href="/disha/<?php echo e($document->id); ?>"> <?php echo e($document->D_LetterNo); ?> </a> </td>
                        <td> <?php echo e($document->D_Subject); ?></td>
                        <td> <?php echo e($document->D_DateIN); ?></td>
                        <td> <?php echo e($document->D_DateOut); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/disha/index.blade.php ENDPATH**/ ?>