window.lleShowHelpButton = function lleShowHelpButton() {
    if ( $(".lleHelp-icon").css('display') == 'none' || $(".lleHelp-icon").css("visibility") == "hidden") {
        $(".lleHelp-icon").css("visibility","visible");
    } else {
        $(".lleHelp-icon").css("visibility","hidden");
    }
}