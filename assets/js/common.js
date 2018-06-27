(function () {
    var wingR = $('.menu-wrp');

    if(wingR.length === 0){
        return;
    }

    function getWindowHeight(){
        return $(window).height();
    }

    function setWingPos(top, duration){
        wingR.stop().animate({'top' : top + 'px'}, duration);
    }

    $(window).bind('scroll', function () {
        var top = $(this).scrollTop();
        setWingPos(top, 300);
    });

    $(window).bind('load', function () {
        var top = $(this).scrollTop();
        setWingPos(top, 300);
    });
}());