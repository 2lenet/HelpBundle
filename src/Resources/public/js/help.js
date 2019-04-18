window.lleShowHelpButton = function lleShowHelpButton() {
    if ( $(".lleHelp-icon").css('display') == 'none') {
        $(".lleHelp-icon").css("display","inline-block");
    } else {
        $(".lleHelp-icon").css("display","none");
    }
}