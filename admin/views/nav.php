		<!-- Navigation -->

	<?php
		if($page_title=='Love Church- Admin'){
	?>
		<nav id="sideBar" class="menu navClosed" role="navigation" style="margin-left: -15rem;">
			<button id="menuCloseBtn" type="button" class="btn btn-outline-secondary" aria-label="Close" style="float: right;">
				<i class="fa fa-window-close" aria-hidden="true"></i>
			</button>
			<hr>
			<ul class="nav navbar-nav content-center">
				<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
				<li>
					<a class="page-scroll" href="#dashboard">Dashboard</a>
				</li>
				<li>
					<a class="page-scroll" href="?l=chat">Chat</a>
				</li>
				<li>
					<a class="page-scroll" href="#pRequests">Prayer Requests</a>
				</li>
				<li>
					<a class="page-scroll" href="#report">Report</a>
				</li>
			</ul>
		</nav>
	<?php
		}
	?>