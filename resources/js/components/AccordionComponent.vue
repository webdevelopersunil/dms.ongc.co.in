<template>
    <div class="accordion" id="accordionReference">
        <div v-for="( document, index ) in documents" v-bind:key="document.id" class="card mb-2">
            <div class="card-header" :id="'header-' + document.id">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#collapse-' + document.id">
                    <span v-if="document.is_reference == 0">Main Document </span>
                    <span v-else>Reference Document #{{ index + 1 }} </span>
                </button>
            </h2>
            </div>
        
            <div :id="'collapse-' + document.id" class="collapse" aria-labelledby="headingOne" data-parent="#accordionReference">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2 form-group text-right">
                            <label for="diary_no">Diary No</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="diary_no" name="diary_no" :value="document.diary_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="date_in" >Date In</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="date" id="date_in" name="date_in" :value="document.date_in" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_no" >Letter/File No.</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="file_no" name="file_no" :value="document.file_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_date">Letter/File Date</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="date" id="file_date" name="file_date" :value="document.file_date" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="received_from">Received From</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="received_from" name="received_from" :value="document.received_from" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="sender_diary_no">Sender's Dy No</label>
                        </div>
                        <div class="col-4 form-group">
                            <input type="text" id="sender_diary_no" name="sender_diary_no" :value="document.sender_diary_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 form-group">
                            <label for="subject">Subject</label>
                            <textarea name="subject" id="subject" rows="3" :value="document.subject" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [ 'documents' ],
    mounted: function() {
        console.log(this.documents);
    }
}
</script>
