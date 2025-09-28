

<?php $__env->startSection('content'); ?>

<div class="container mt-fit px-0 shadow" >

        <?php echo $__env->make('templates.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="p-2 mb-4 bg-lightblue">
            <h5 class="mt-2 mb-4"> Filter Audit Logs </h5>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="audit-date-start">Start Date</label>
                    <input type="date" class="form-control" ref="auditDateStart" >
                </div>
                <div class="col-6 form-group">
                    <label for="audit-date-end">End Date</label>
                    <input type="date" class="form-control" ref="auditDateEnd" >
                </div>
                <div class="col-6 form-group">
                    <label for="audit-diary">Diary No</label>
                    <input type="text" class="form-control" ref="auditDiary" >
                </div>
                <div class="col-6 form-group">
                    <label for="audit-diary">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">All</option>
                        <option value="govt_letter">Govt. Letters</option>
                        <option value="cmd_office_correspondence"> CMD's Office Correspondence</option>
                        <option value="general">General | DDN Letters</option>
                        <option value="files">Files</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" @click="onAuditFilterClicked">Search</button>
        </div>

        <div class="p-2 mb-4 bg-lightblue">

            <h5 class="mt-2 mb-4"> <?php echo e($params); ?> </h5>

            <table class="table bg-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Old</th>
                        <th>New</th>
                        <th>User</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $audits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($key + 1); ?> </td>
                        <td> <?php echo e($log->event); ?> </td>
                        <td> 
                            <ul>
                            <?php $__currentLoopData = $log->old_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                <li> <?php echo e($key); ?> : <?php echo e($value); ?> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <?php $__currentLoopData = $log->new_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <li> <?php echo e($key); ?> : <?php echo e($value); ?>  </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td> <?php echo e($log->user ? $log->user->name : ''); ?> </td>
                        <td> <?php echo e($log->ip_address); ?> </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

        </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/reports/audit/index.blade.php ENDPATH**/ ?>