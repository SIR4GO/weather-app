function screenHeight() {
    var height = $(window).height();
    $('.screen').height(height); // height dynamically from screen to another
}


$(function () {

    screenHeight();

});