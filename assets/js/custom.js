jQuery(document).ready(function() {
    // for hover dropdown menu
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });
    // slick slider call 
    $('.slick_slider').slick({
        dots: true,
        infinite: true,
        speed: 800,
        slidesToShow: 1,
        slide: 'div',
        autoplay: true,
        autoplaySpeed: 5000,
        cssEase: 'linear'
    });
    // latest post slider call 
    $('.latest_postnav').newsTicker({
        row_height: 64,
        speed: 800,
        prevButton: $('#prev-button'),
        nextButton: $('#next-button')
    });
    jQuery(".fancybox-buttons").fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        closeBtn: true,
        helpers: {
            title: {
                type: 'inside'
            },
            buttons: {}
        }
    });
    // jQuery('a.gallery').colorbox();
    //Check to see if the window is top if not then display button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    //Click event to scroll to top
    $('.scrollToTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('.tootlip').tooltip();
    $("ul#ticker01").liScroll();
});

wow = new WOW({
    animateClass: 'animated',
    offset: 100
});
wow.init();

// $("#comment_form").on('submit', function(e){
//     e.preventDefault();
//     var cmnt_name = $(this).find('input[name="cmnt_name"]');
//     var cmnt_body = $(this).find('textarea[name="cmnt_body"]');
//     var post_id = $(this).find('input[name="post_id"]');
//     // console.log(cmnt_body);

//     var cmt_template = `<li class="wow fadeInDown">
//                   <p>${cmnt_body.val()}</p>
//                   <span class="right">Commented by ${cmnt_name.val()}</span>
//                 </li>`;
//     $('.all-comments>ul').prepend(cmt_template);

//     $.post(`single_page.php?post_id=${post_id.val()}`,
//     {
//         cmnt_name: cmnt_name.val(),
//         cmnt_body: cmnt_body.val()
//     },
//     function(data, status){
//         // alert("Data: " + data + "\nStatus: " + status);
//         console.log(status);
//         cmnt_name.val('');
//         cmnt_body.val('');
//     });

    
// })

jQuery(window).load(function() { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(100).css({
        'overflow': 'visible'
    });
})