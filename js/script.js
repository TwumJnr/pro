//variables
var pReq = document.getElementById('pReqContainer');

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// jQuery to collapse the navbar on scroll
$(window).scroll(function () {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
		$(".navbar-brand").addClass("navbar-brand-collapse");
		$(".scroll-top").addClass("visible");
		$(".scroll-top").removeClass("hide");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
		$(".navbar-brand").removeClass("navbar-brand-collapse");
		$(".scroll-top").removeClass("visible");
		$(".scroll-top").addClass("hide");
    }
});

//script to toggle prayer request form
$('#pReqBtn').click(function () {
	if (pReq.classList.contains('pReqCollapse')) {
		$('#pReqName').animate({
			height: '2.3rem', width: '20rem', padding: '0.5rem'
		});
		$('#pReqSub').animate({
			height: '2.3rem', width: '20rem', padding: '0.5rem'
		});
		$('#request').animate({
			height: '10rem', width: '20rem', padding: '0.5rem'
		});
		$('#pReqBtn').animate({
			margin: '0.5rem'
		});
		$('#pReqContainer').animate({
			bottom: '-0.2rem', width: '21rem'
		});
		pReq.classList.remove('pReqCollapse');
		pReq.classList.add('pReqOpen');
	} else {
		$('#pReqName').animate({
			height: '0', width: '0', padding: '0'
		});
		$('#pReqSub').animate({
			height: '0', width: '0', padding: '0'
		});
		$('#request').animate({
			height: '0', width: '0', padding: '0'
		});
		$('#pReqBtn').animate({
			margin: '0'
		});
		$('#pReqContainer').animate({
			bottom: '-5.3rem', width: '20rem'
		});
		pReq.classList.remove('pReqOpen');
		pReq.classList.add('pReqCollapse');
	}
});

//auto refresh
$(document).ready(function () {
	$('#pReqSub').click(function () {
		var pReqName = $('#pReqName').val();
		var req = $('#request').val();
		if ($.trim(pReqName) !== '') {
			if ($.trim(req) !== '') {
				$.ajax({
					url: "includes/pRequest.php",
					method: "POST",
					data: {pReqName: pReqName, request: req},
					dataType: "text",
					success: function (data) {
						$('#request').val("");
						$('#pReqName').val("");
					}
				});
			}
		}
	});
	setInterval(function () {
		$('#pReqPage').load("../views/pRep.php");
	}, 1000);
});