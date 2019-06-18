require('./bootstrap');
// require('./homescreen');

window.Vue = require('vue');

Vue.component('app-accordion', require('./components/AccordionComponent.vue').default);


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
                "subcategories": [ 
                    { "name": "Govt. Letters", "value": "letter1" },
                 ]
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
                "subcategories": [ 
                    { "name": "General | DDN Letters", "value": "general1" },
                 ]
            },
            {
                "value": "files",
                "name": "Files",
                "subcategories": [
                    { "name": "Files", "value": "files1" },
                ]
            },
        ]
    },
    methods: {
        onCategorySelection() {
            window.location.href = `/document/create/${this.selectedCategory.value}/${this.selectedSubcategory.value}`;
        }
    }

    // VUE JS

});
