        //==========Source untuk button bar===========//
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    
        //==========Source untuk mengaktifika (active pada sidebar)===========//
        if ($('#sidebar').hasClass('active')) {
            $('.heading').addClass('active');
        } else {
            $('.heading').removeClass('active');
        }
    });

    $('.more-button,.body-overlay').on('click', function () {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
    });

    $('#sidebar ul li a').on('click', function () {
        $('#sidebar ul li a i').removeClass('active');

        $(this).find('i').addClass('active');
    })
});