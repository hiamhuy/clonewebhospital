

$(document).ready(function(){

    $('body').removeClass('preLoading');
    $('.load').delay(1000).fadeOut('fast');

    $('#icon').click(function(){
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('active');
    });
    $(window).on('load scroll', function(){
        $('#icon').removeClass('fa-times');
        $('.navbar').removeClass('active');
    });

    $('.ar-contact-us').click(function(){
        $('.fa-headset').toggleClass('fa-times');
        $('.ar-contact div#hotline').toggleClass('activeHotline');
    });

    $('.carousel').flickity({
        cellAlign: 'left',
        contain: true
      });
});
