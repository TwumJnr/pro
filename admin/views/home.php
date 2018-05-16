		<?php 
			//<!--Page Navigation-->
			include 'views/nav.php';
			//<!--Dashboard Section-->
			include 'dashboard.php';
			//<!--Prayer Requests Section-->
			include 'pReq.php';
			//<!--Report Section-->
			include 'report.php';
		?>

		<script>
			//script to toggle menu
			//open menu

			$('#menuBtn').click(function () {
				if (nav.classList.contains('navClosed')) {
					$('#sideBar').animate({
						marginLeft: '0'
					});
					nav.classList.remove('navClosed');
					nav.classList.add('navOpened');
				}
			});
			//collapse menu
			$('#menuCloseBtn').click(function () {
				$('#sideBar').animate({
					marginLeft: '-15rem'
				});
				nav.classList.add('navClosed');
				nav.classList.remove('navOpened');
			});

			// jQuery to show back to top button
			$(window).scroll(function () {
				if ($(".menu").offset().top > 50) {
					$(".scroll-top").addClass("visible");
					$(".scroll-top").removeClass("hide");
				} else {
					$(".scroll-top").removeClass("visible");
					$(".scroll-top").addClass("hide");
				}
			});

		</script>