function scrolToTop(){
    $('html,body').animate({
        scrollTop: $("body").offset().top
    }, 'slow');
}