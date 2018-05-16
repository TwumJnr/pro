//variables
var nav = document.getElementById('sideBar');
var chatForm = document.getElementById('chatForm');

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
		if (nav.classList.contains('navOpened')) {
			$('#sideBar').animate({
				marginLeft: '-15rem'
			});
			nav.classList.add('navClosed');
			nav.classList.remove('navOpened');
		}
    });
});