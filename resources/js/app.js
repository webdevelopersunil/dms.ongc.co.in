require('./bootstrap');
// require('./homescreen');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    data: {
        category: {
            options: []
        },
        categories: [
            {
                "name": "files",
                "subcategories": [ "files1", "files2" ]
            },
            {
                "name": "general",
                "subcategories": [ "general1", "general2" ]
            },
            {
                "name": "govt_letters",
                "subcategories": [ "govt_letters1", "govt_letters2" ]
            }
        ]
    },
    methods: {
        onSelectionChange() {
        //oops nothing here, coz i dont have to! ;)
        }
    }

    // VUE JS

});
