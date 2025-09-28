require("jquery-ui-dist/jquery-ui");
$(function() {
    var markedTo = [
        "D(Finance)",
        "D(Offshore)",
        "D(Onshore)",
        "D(HR)",
        "D(T&FS)",
        "D(Exploration)",
        "Chief (CS&P)",
        "Chief (IA)",
        "All EC Members",
        "CVO"
    ];

    var copyTo = [
        "AKB",
        "PKM",
        "DKA",
        "All EC Members",
        "D(Finance)",
        "D(Offshore)",
        "D(Onshore)",
        "D(HR)",
        "D(T&FS)",
        "D(Exploration)",
        "Chief (CS&P)",
        "Chief (IA)",
        "CVO"
    ];

    $("#D_MarkedTo").autocomplete({
        source: markedTo
    });

    $("#D_CopyTO").autocomplete({
        source: copyTo
    });
});
