

<?php $__env->startSection('content'); ?>
    
<div class="container mt-fit px-0 shadow" >

    <?php echo $__env->make('templates.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="p-2 mb-4 bg-lightblue">

        <form action="/document/search" method="post">
        <?php echo csrf_field(); ?>
            <div class="row pt-3">

                <div class="col-2 text-right px-0">
                    <label for="category" class="text-bold text-danger">Category</label>
                </div>
                <div class="col-4 form-group ">
                    <select name="category" id="category" class="form-control form-control-sm font-weight-bold">
                        <option value="All">All</option>
                        <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option class="font-weight-bold" value="<?php echo e($item->id); ?>" <?php if($item->id == $category): ?> selected <?php endif; ?> > <?php echo e($item->cm_name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-2 text-right px-0">
                    <label for="subcategory" class="text-bold text-danger" >Sub Category</label>
                </div>
                <div class="col-4 form-group ">
                    <select name="subcategory" id="subcategory" class="form-control form-control-sm font-weight-bold">
                        <option value="NA">NA</option>
                        <?php $__currentLoopData = \App\Subcategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option class="font-weight-bold" <?php if($item->id == $subcategory): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>"> <?php echo e($item->scm_head); ?> - <?php echo e($item->scm_desc); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-2 text-right px-0">
                    <label for="diary_no">Diary No</label>
                </div>
                <div class="col-4 form-group ">
                    <input autofocus type="text" id="diary_no" value="<?php echo e($remember->D_diaryNo); ?>" name="diary_no" class="form-control form-control-sm font-weight-bold">
                </div>

                
                <div class="col-6"></div>

                <div class="col-2 text-right px-0">
                    <label for="date_from">Date From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_from" value="<?php echo e($remember->D_DATE_from); ?>" name="date_from" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_to">Date To</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_to" value="<?php echo e($remember->D_DATE_to); ?>" name="date_to" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_LetterNo">Letter No</label>
                </div>
                <div class="col-4 form-group">
                    <input type="text" id="D_LetterNo" value="<?php echo e($remember->D_LetterNo); ?>" name="D_LetterNo" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_SendersName">Received From</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_SendersName" value="<?php echo e($remember->D_SendersName); ?>" name="D_SendersName" class="form-control form-control-sm font-weight-bold">
                </div>
    
                <div class="col-2 text-right px-0">
                    <label for="subject">Subject</label>
                </div>
                <div class="col-10 form-group ">
                    <input type="text" id="subject" value="<?php echo e($remember->D_Subject); ?>" name="subject" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_from">Date In (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_from" value="<?php echo e($remember->D_DateIN_from); ?>" name="date_in_from" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date In (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_in_to" value="<?php echo e($remember->D_DateIN_to); ?>" name="date_in_to" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_out_from">Date Out (From)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_from" value="<?php echo e($remember->D_DateOut_from); ?>"  name="date_out_from" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="date_in_to">Date out (To)</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="date" id="date_out_to" value="<?php echo e($remember->D_DateOut_to); ?>"  name="date_out_to" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_MarkedBy">Marked By</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_MarkedBy" value="<?php echo e($remember->D_MarkedBy); ?>" name="D_MarkedBy" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_MarkedTo">Marked To</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_MarkedTo" value="<?php echo e($remember->D_MarkedTo); ?>" name="D_MarkedTo" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="col-2 text-right px-0">
                    <label for="D_Remarks">Remarks</label>
                </div>
                <div class="col-4 form-group ">
                    <input type="text" id="D_Remarks" value="<?php echo e($remember->D_Remarks); ?>" name="D_Remarks" class="form-control form-control-sm font-weight-bold">
                </div>

                <div class="offset-2 col-10 my-0">
                    <button class="btn dms-btn-primary mx-1 px-4">Search</button>
                    <a class="btn dms-btn-primary mx-1 px-4" href="/document/reset">Reset</a>
                    <a href="/" class="btn dms-btn-primary mx-1 px-4">Exit</a>
                    <button type="button" class="btn dms-btn-primary mx-1 px-4" data-toggle="modal" data-target="#createModal">Create Document</button>
                </div>

            </div>
        
        </form>
        <?php if( !empty($documents) ): ?>
            <div class="card mt-2">
                
                <div class="card-header pt-2 pb-1">
                    <h4 style="color: darkred">Search Results <span style="font-size: 1.2rem"> Total Documents: <?php echo e($count); ?>.  </span> </h4>
                </div>

                <div class="card-body p-0" style="height:250px; overflow:scroll">
                    <div class="dms-wrapper">
                        <div class="dms-scroller">
                            <table class="table table-bordered dms-table" style="border:none">
                                <thead>
                                    <tr>
                                        <th class="dms-sticky-col-1" > View </th>
                                        <th class="dms-sticky-col-2"> Edit </th>
                                        <th class="dms-sticky-col-3"> Print </th>
                                        <th class="dms-sticky-col-4"> 
                                            Diary No
                                            <a href="/document/sort?column=D_diaryNo&order=asc" class="text-success"> <i data-feather="chevrons-up"></i></a>
                                            <a href="/document/sort?column=D_diaryNo&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th class="dms-sticky-col-5"> Letter No </th>
                                        <th style="width:5%"> 
                                            Date In
                                            <a href="/document/sort?column=D_DateIN&order=asc" class="text-success"> <i data-feather="chevrons-up"></i> </a>
                                            <a href="/document/sort?column=D_DateIN&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th style="width:5%"> 
                                            DateOut
                                            <a href="/document/sort?column=D_DateOut&order=asc" class="text-success"> <i data-feather="chevrons-up"></i> </a>
                                            <a href="/document/sort?column=D_DateOut&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th style="width:5%"> 
                                            Letter Date
                                            <a href="/document/sort?column=D_DATE&order=asc" class="text-success"> <i data-feather="chevrons-up"></i> </a>
                                            <a href="/document/sort?column=D_DATE&order=desc" class="text-danger"> <i data-feather="chevrons-down"></i> </a>
                                        </th>
                                        <th> <?php echo e($category == 2 ? 'Letter Addressed To' : 'Received From'); ?> </th>
                                        <th> Subject </th>
                                        <th> Marked To </th>
                                        <th> Copy To </th>
                                        <th> Marked By </th>
                                        <th> Remarks </th>
                                    </tr>    
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="<?php echo e($document->D_DateOut || $document->D_fileno ? '' : 'highlighted'); ?>" >
                                            <td class="dms-sticky-col-1 <?php echo e($document->D_DateOut || $document->D_fileno ? '' : 'highlighted'); ?>"> 
                                                <?php if($document->D_fileno): ?> <a target="_blank" href="/document/file/<?php echo e($document->id); ?>?r=<?php echo e($hrefBust); ?>" class="view"> View </a> 
                                                <?php else: ?> <a href="#">View</a>
                                                <?php endif; ?> 
                                            </td>
                                            <td class="dms-sticky-col-2 <?php echo e($document->D_DateOut || $document->D_fileno ? '' : 'highlighted'); ?>"> <a href="/document/view/<?php echo e($document->id); ?>"> Edit </a> </td>
                                            <td class="dms-sticky-col-3 <?php echo e($document->D_DateOut || $document->D_fileno ? '' : 'highlighted'); ?>"> <a href="/document/print/<?php echo e($document->id); ?>">Print </a> </td>
                                            <td class="dms-sticky-col-4 <?php echo e($document->D_DateOut || $document->D_fileno ? '' : 'highlighted'); ?>" > 
                                                <span> <?php echo e($document->D_diaryNo); ?> </span>
                                            </td>
                                            <td class="dms-sticky-col-5 <?php echo e($document->D_DateOut || $document->D_fileno ? '' : 'highlighted'); ?>"> <?php echo e($document->D_LetterNo); ?> </td>
                                            <td> <?php echo e($document->D_DateIN ? date('d-m-Y', strtotime($document->D_DateIN)) : ''); ?></td>
                                            <td> <?php echo e($document->D_DateOut ? date('d-m-Y', strtotime($document->D_DateOut)) : ''); ?></td>
                                            <td> <?php echo e($document->D_DATE ? date('d-m-Y', strtotime($document->D_DATE)) : ''); ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo e($document->D_SendersName); ?>"> <?php echo e($document->category_id == 2 ? $document->D_LetteraddressedTo : $document->D_SendersName); ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo e($document->D_Subject); ?>"> <?php echo e($document->D_Subject); ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo e($document->D_MarkedTo); ?>"> <?php echo e($document->D_MarkedTo); ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo e($document->D_CopyTO); ?>"> <?php echo e($document->D_CopyTO); ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo e($document->D_MarkedBy); ?>"> <?php echo e($document->D_MarkedBy); ?></td>
                                            <td data-toggle="tooltip" data-placement="top" title="<?php echo e($document->D_Remarks); ?>"> <?php echo e($document->D_Remarks); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="customScrollbar" class="bg-lightblue mb-2" style="height:30px; max-width:100%; overflow-x:scroll;">
                <div style="width:2000px; height: 30px;"></div>
            </div>
            <?php echo e($documents->links()); ?>

        <?php endif; ?>
    </div>

</div>

<?php echo $__env->make('templates.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/document/search.blade.php ENDPATH**/ ?>