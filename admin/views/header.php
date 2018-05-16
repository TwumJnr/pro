		<header id="head">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<?php
							if ($page_title=='Love Church- Admin'){
								?>
									<a class="navbar-brand page-scroll" href="#page-top" style="float: right">Love Church <h6>ADMIN</h6></a>
									<button id="menuBtn" class="btn btn-outline-secondary" type="button">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
									<a href="?l=logout" class="navbar-brand" style="font-size: 1rem; margin-top:0.7rem;"><?php echo $_SESSION['username'];?></a>
								<?php
							}else{
								?>
									<a class="navbar-brand" href="?l=home">Love Church <h6>ADMIN</h6></a>
									<a href="?l=logout" class="navbar-brand" style="font-size: 1rem; margin-top:0.7rem; float: right;"><?php echo $_SESSION['username'];?></a>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</header>