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

    var inputPhone = $('.js-input-phone');

    function autoHypenPhone(str){
        str = str.replace(/[^0-9]/g, '');
        var tmp = '';
        if( str.length < 4){
            return str;
        }else if(str.length < 7){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
            return tmp;
        }else if(str.length < 11){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 3);
            tmp += '-';
            tmp += str.substr(6);
            return tmp;
        }else{
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7);
            return tmp;
        }
        return str;
    }

    function applyPhoneNumberEvent(){
        var val = $(this).val().trim();
        $(this).val(autoHypenPhone(val));
    }

    inputPhone.bind('keydown', applyPhoneNumberEvent);
    inputPhone.bind('keyup', applyPhoneNumberEvent);


}());