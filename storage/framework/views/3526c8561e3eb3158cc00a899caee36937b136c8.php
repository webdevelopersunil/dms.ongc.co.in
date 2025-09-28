

<?php $__env->startSection('content'); ?>

    <div class="container mt-fit px-0 shadow" >

        <?php echo $__env->make('templates.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="my-2 mx-4"> Total Logged In Users: <?php echo e($users->count()); ?> </h5>
            
            <table class="table bg-light">
                <thead class="thead-light">
                    <tr>
                        <th>User Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($user->name); ?> </td>
                            <td> <app-online page="<?php echo e($user->working_on); ?>" :mode="<?php echo e($user->is_online); ?>" ></app-online> </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/reports/users.blade.php ENDPATH**/ ?>