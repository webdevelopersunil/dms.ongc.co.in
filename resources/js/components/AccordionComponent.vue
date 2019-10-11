<template>
    <div class="accordion" id="accordionReference">
        <div v-for="( document, index ) in documents" v-bind:key="document.id" class="card mb-2">
            <div class="card-header" :id="'header-' + document.id">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#collapse-' + document.id">
                            <span v-if="document.reference_of == -1">Main Document </span>
                            <span v-else>Reference Document #{{ index + 1 }} </span>
                        </button>
                    </h2>
                    <a :href="'/document/view/' + document.id" class="text-success">Open</a>
                </div>
            </div>
        
            <div :id="'collapse-' + document.id" class="collapse" aria-labelledby="headingOne" data-parent="#accordionReference">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2 form-group text-right">
                            <label for="diary_no">Diary No</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="diary_no" name="diary_no" :value="document.diary_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="date_in" >Date In</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="date" id="date_in" name="date_in" :value="dateTransform(document.date_in)" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_no" >Letter/File No.</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="file_no" name="file_no" :value="document.file_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_date">Letter/File Date</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="date" id="file_date" name="file_date" :value="dateTransform(document.file_date)" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="received_from">Received From</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="received_from" name="received_from" :value="document.received_from" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="sender_diary_no">Sender's Dy No</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="sender_diary_no" name="sender_diary_no" :value="document.sender_diary_no" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 form-group">
                            <label for="subject">Subject</label>
                            <textarea readonly name="subject" id="subject" rows="3" :value="document.subject" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 form-group text-right">
                            <label for="marked_to">Marked To</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="marked_to" name="marked_to" :value="document.marked_to" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="copy_to" >Copy To</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="copy_to" name="copy_to" :value="document.copy_to" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="" >Date Out</label>
                        </div>
                        <div class="col-4 form-group ">
                            <input readonly type="date" id="date_out" name="date_out" :value="dateTransform(document.date_out)" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 form-group text-right">
                            <label for="file_date">Marked By</label>
                        </div>
                        <div class="col-4 form-group">
                            <input readonly type="text" id="marked_by" name="marked_by" :value="document.marked_by" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 form-group">
                            <label for="remarks">Remarks</label>
                            <textarea readonly name="remarks" id="remarks" rows="3" class="form-control" v-text="document.remarks"></textarea>
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
    },
    methods: {
        dateTransform: function(datetime) {
            var d = new Date(datetime),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join('-');
        }
    }
}
</script>
