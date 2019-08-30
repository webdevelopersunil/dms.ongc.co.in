require('./bootstrap');
// require('./audit');

window.Vue = require('vue');

Vue.component('app-accordion', require('./components/AccordionComponent.vue').default);
Vue.component('app-online', require('./components/OnlineCircle.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        selectedCategory: {
            options: []
        },
        selectedSubcategory: {
            name: '',
            value: ''
        },
        categories: [
            {
                "value": "govt_letters",
                "name": "Govt. Letters",
                "subcategories": null
            },
            {
                "value": "cmd_office_correspondence",
                "name": "CMD's Office Correspondence",
                "subcategories": [ 
                    { "name": "CMD|01 Secret Letters", "value": "secret_letter" }, 
                    { "name": "CMD|02 Special Reply of Misc", "value": "special_reply" },
                    { "name": "CMD|03 Ministry's Correspondence", "value": "ministry_correspondence" },
                ]
            },
            {
                "value": "general",
                "name": "General | DDN Letters",
                "subcategories": null
            },
            {
                "value": "files",
                "name": "Files",
                "subcategories": null
            },
        ],
        documentsInCategory: [],
    },
    methods: {
        onCategorySelection() {
            window.location.href = `/document/create/${this.selectedCategory.value}/${this.selectedSubcategory.value}`;
        },

        onCategoryViewed(category) {
            console.log(category);

            this.documentsInCategory = ['a','b','c'];
        },

        onAuditFilterClicked() {
            var startDate = this.$refs.auditDateStart.value;
            var endDate = this.$refs.auditDateEnd.value;
            var diaryNo = this.$refs.auditDiary.value;

            if( startDate && endDate ) {
                window.location.href = `/reports/audit/date/${startDate}/${endDate}`;
            }
            if( diaryNo ) {
                window.location.href = `/reports/audit/diary/${diaryNo}`;
            }

            console.log(this.$refs);
        }
    }

    // VUE JS

});
