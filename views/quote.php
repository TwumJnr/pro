		<section id="quotes" class="content-center">
			<div class="element-center">
				<div class="container">
					<div class="col-md-6">
						<div class="quote-text">
							<?php
								$sql = "SELECT * FROM quotes WHERE status='Live'";//create sql query      WHERE status='active'
								$result = $connect->query($sql);
								$row = $result->fetch_assoc();
							?>
							<p class="lead" style="font-size: 2rem;"><?php echo $row['quote'] ?></p>
							<h6 id="quote-footer">-<?php echo $row["quoter"]; ?></h6>
						</div>
					</div>
				</div>
			</div>
		</section>