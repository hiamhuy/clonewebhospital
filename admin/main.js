$(document).ready(function() {
    $('.function li').click(function() {
        $('.tab-content-item').hide();
        $('.tab-content-item:first-child').fadeIn();
        $(this).addClass('active');
        $('.function li').removeClass('active');
    
        let tabContent = $(this).children('a').attr('href');
        $('.tab-content-item').hide();
        $(tabContent).fadeIn();
        return false;
    });

    $('#btn-add-staff').click(function() {
        $('#form-staff').addClass('show');
    });
    $('#close').click(function() {
        $('#form-staff').removeClass('show');
    });

    $('#btn-edit-staff').click(function() {
        $('#form-edit-staff').addClass('activeForm');
    });
    $('#close-edit-staff').click(function() {
        $('#form-edit-staff').removeClass('activeForm');
    });

    $('#btn-add-news').click(function() {
        $('#form-news').addClass('activeShow');
    });
    $('#close-news').click(function() {
        $('#form-news').removeClass('activeShow');
    });

    $('#btn-edit-news').click(function() {
        $('#form-edit-news').addClass('activeEdit');
    });
    $('#close-edit-news').click(function() {
        $('#form-edit-news').removeClass('activeEdit');
    });

});

