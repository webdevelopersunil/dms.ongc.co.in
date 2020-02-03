require("./bootstrap");
require("./autocomplete");
// require('./audit');

var urlParams = new URLSearchParams(window.location.search);
if (urlParams.has("hyperlink")) {
    document.getElementById("scan").click();
}

$(function() {
    // DEPRECATED: Older implementation of scroll tables
    // $(".main-table")
    //     .clone(true)
    //     .appendTo("#table-scroll")
    //     .addClass("clone");

    $("#customScrollbar").on("scroll", function() {
        $(".dms-scroller").scrollLeft($(this).scrollLeft());
    });

    $('[data-toggle="tooltip"]').tooltip();
});
const feather = require("feather-icons");
feather.replace();

window.Vue = require("vue");

Vue.component(
    "app-accordion",
    require("./components/AccordionComponent.vue").default
);
Vue.component("app-online", require("./components/OnlineCircle.vue").default);

const app = new Vue({
    el: "#app",
    data: {
        selectedCategory: {
            options: []
        },
        selectedSubcategory: {
            name: "",
            value: ""
        },
        categories: [
            {
                value: 1,
                name: "Govt. Letters",
                subcategories: null
            },
            {
                value: 2,
                name: "CMD's Office Correspondence",
                subcategories: [
                    { name: "CMD|01 Secret Letters", value: 28 },
                    {
                        name:
                            "CMD|02 Special / Reply of Misc Invitation Letters",
                        value: 29
                    },
                    {
                        name:
                            "CMD|03 Ministry's Correspondence / Govt. Correspondence",
                        value: 30
                    },
                    {
                        name: "CMD|05 Internal Correspondence",
                        value: 2391
                    },
                    {
                        name:
                            "CMD|09 Acknowledgement / Appointments / Regret / Meetings / Misc. / General",
                        value: 2395
                    },
                    {
                        name:
                            "CMD|10 Invitations for Semianr / Conferences / Meetings / Sponsorships etc.",
                        value: 2396
                    },
                    {
                        name: "Transfer",
                        value: 2397
                    },
                    {
                        name: "Promotion",
                        value: 2398
                    }
                ]
            },
            {
                value: 3,
                name: "General | DDN letters",
                subcategories: null
            },
            {
                value: 4,
                name: "Files",
                subcategories: null
            },
            {
                value: 5,
                name: "Misc",
                subcategories: null
            }
        ],
        documentsInCategory: []
    },
    methods: {
        onCategorySelection() {
            window.location.href = `/document/create/?category=${this.selectedCategory.value}&subcategory=${this.selectedSubcategory.value}`;
        },

        onCategoryViewed(category) {
            console.log(category);

            this.documentsInCategory = ["a", "b", "c"];
        },

        onAuditFilterClicked() {
            var startDate = this.$refs.auditDateStart.value;
            var endDate = this.$refs.auditDateEnd.value;
            var diaryNo = this.$refs.auditDiary.value;

            if (startDate && endDate) {
                window.location.href = `/reports/audit/date/${startDate}/${endDate}`;
            }
            if (diaryNo) {
                window.location.href = `/reports/audit/diary/${diaryNo}`;
            }

            console.log(this.$refs);
        }
    }

    // VUE JS
});
