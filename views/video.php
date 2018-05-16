
		<section id="sermons" class="content-center">
			<div class="element-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php
								$sql= "SELECT * FROM video WHERE status= 'Current'";
								$result = $connect->query($sql);
								$row = $result->fetch_assoc()
							?>
							<h3><?php echo $row['title']; ?></h3><hr>
							<div class="video-wrapper">
								<iframe src="https://www.youtube.com/embed/<?php echo $row['video']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>