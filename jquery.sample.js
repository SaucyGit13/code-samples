function base(){
    $(".main-homepage-image").height($(window).height());
    $(window).on('resize', function(){
        $(".main-homepage-image").height($(window).height());
    });
    $('.homepage-down').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('data-scroll')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
    var $hamburger = $(".hamburger");
    $hamburger.on("click", function(e) {
        $hamburger.toggleClass("is-active");
        $('.phone_nav_wrapper').slideToggle();
    });
    $('.phone_nav_wrapper .nav_content ul li .moreBtn').click(function(){
        if ($(this).hasClass('open')){
            $(this).removeClass('open');
            $(this).prev('a').removeClass('subnav_open');
            $(this).parent('li').children('ul').slideUp();
        }else{
            $('.moreBtn').removeClass('open');
            $(this).addClass('open');
            $('.phone_nav_wrapper .nav_content ul li ul').not($(this).parent('li').children('ul').slideDown()).slideUp();
            $(this).prev('a').toggleClass('subnav_open');
            $('.phone_nav_wrapper .nav_content ul li a').not($(this).prev('a')).removeClass('subnav_open');
            $(this).parent('li').children('ul').slideDown();
        }
    });
    $(window).resize(function() {
        if ($(window).width() >= 767) {
            $('.phone_nav_wrapper').hide();
        }
    });
    if ($('#homepage').length){

        var dkObj = new Dropkick('#dropkick-jump',{mobile: true});
        $('#dropkick-jump').on('change', function() {
           window.location.href = $(this).val();
        });
    }
}
