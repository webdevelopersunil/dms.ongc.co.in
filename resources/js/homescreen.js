
const categories = {
    "govt_letters": [
        "govt_letters1",
        "govt_letters2"
    ],
    "general": [
        "general1",
        "general2"
    ],
    "files": [
        "files1",
        "files1"
    ]

};

$(function(){

    $("#select-category").change( function() {
        var options = categories[ this.value ];

        options.forEach( elem => {

            var child = `
            <option value="${elem}"> ${ elem } </option>
            `;

            $("#select-subcategory").append( child );
        })
    })

    // JQUERY 

});