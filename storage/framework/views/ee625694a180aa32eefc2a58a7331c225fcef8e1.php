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
                                <option v-for="category in categories" v-bind:value="category"> {{ category.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="category" class="col-sm-3"> Select SubCategory</label>
                        <div class="col-sm-9">
                            <select v-model="selectedSubcategory" class="form-control form-control-sm">
                                <option v-for="option in selectedCategory.subcategories" v-bind:value="option" >{{ option.name }}</option>
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
    </div><?php /**PATH /Library/WebServer/Documents/dev/10.205.39.98/dms-plus/resources/views/templates/modal.blade.php ENDPATH**/ ?>