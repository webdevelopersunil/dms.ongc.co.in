

<?php $__env->startSection('content'); ?>

    <div class="flex flex-col" style="height: 100vh;">

        <div class="h-50 title-image-container">
            <div class="container">
                <img src="/images/ongc.png" class="ongc-logo" alt="ongc.logo">
            </div>
        </div>

        <div class="h-50 content-container d-flex">
            <div class="d-block dms-btn-container" style="flex:1">
                <button class="btn dms-btn-primary btn-block" data-toggle="modal" data-target="#createModal"> CREATE </button>
                <a class="btn dms-btn-primary btn-block" href="/disha"> DISHA </a>
                <a class="btn dms-btn-primary btn-block" href="/document/search"> SEARCH </a>
                <a class="btn dms-btn-primary btn-block" href="/reports"> REPORTS </a>
                <button class="btn dms-btn-primary btn-block" onclick="document.getElementById('form-logout').submit()"> EXIT </button>
            </div>
            <div style="flex:3">
                <h1 class="dms-heading" >DMS <sup>+</sup> </h1>
                <div style="position:absolute; bottom: 50px; right: 50px;"> <?php echo $__env->make('templates.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </div>
            </div>
        </div>

        <form id="form-logout" action="/logout" method="post" class="d-none">
        <?php echo csrf_field(); ?>
        </form>

    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="px-4">
                    <div class="row form-group">
                        <label for="category" class="col-sm-3"> Select Category</label>
                        <div class="col-sm-9">
                            <select v-model="selectedCategory" class="form-control form-control-sm">
                                <option class="font-weight-bold" v-for="category in categories" v-bind:value="category"> {{ category.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" v-if="selectedCategory.subcategories">
                        <label for="category" class="col-sm-3"> Select SubCategory</label>
                        <div class="col-sm-9">
                            <select v-model="selectedSubcategory" class="form-control form-control-sm">
                                <option class="font-weight-bold" v-for="option in selectedCategory.subcategories" v-bind:value="option" >{{ option.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                <button type="button" class="btn btn-primary" @click="onCategorySelection()" >Create</button>
            </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/home.blade.php ENDPATH**/ ?>