(function() {
    'use strict';

    var $formBtn = $('.quote-req-btn'),
        $bigForm = $('.big-form'),
        $closeBtn = $('button.close-icon'),
        $classListIn = 'animated bounceInRight slide-in',
        $classListOut = 'animated bounceOutRight slide-out',
        $mobBtn = $("#mobBtn"),
        $mainHeader = $("");

    var wrap = $("#wrap");

    wrap.on("scroll", function(e) {

        if (this.scrollTop > 147) {
            wrap.addClass("fix-search");
        } else {
            wrap.removeClass("fix-search");
        }

    });


    $formBtn.click(function(){
        $bigForm.addClass($classListIn);
    });

    $closeBtn.click(function(){
        if($bigForm.hasClass($classListIn)){
            $bigForm.removeClass('animated bounceInRight slide-in');
       }

    });

    $mobBtn.click(function(){
       $(".main-navigation").css('left', '0').addClass('animated bounceInLeft');
    });

    $(".secondary-submenu a").addClass('hvr-sweep-to-bottom');
})();