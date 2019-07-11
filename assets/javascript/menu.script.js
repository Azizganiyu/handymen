//function to trigger when responsive menu button clicked
$('.nav-icon-wrapper').on('click', function(){
    $(this).toggleClass('change')
    var status = $('.nav-links').css('display');
    if(status == 'none'){
        $('.nav-links').show(700);
    }else{
        $('.nav-links').hide(700);
    }
})
/*function nav() {
    $('.menu_icon').toggleClass('change');
    status = $('.responsive_nav').css('display');
    if(status == 'none'){
        $('.responsive_nav').slideDown(700);
    }else{
        $('.responsive_nav').slideUp(700);
    }
} */

//hide or display responsive nav when user manually resize window
$(window).on('resize', function(){
    if($(window).width() > 783){
        $('.responsive_nav').hide();
    }else{
        if($('.menu_icon').hasClass('change')){
            $('.responsive_nav').show();
        }
    }
})

