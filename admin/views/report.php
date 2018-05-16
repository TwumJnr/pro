<section id="report">

	<div class="container">
		<h2 class="section-header">Report</h2><hr>
		<div class="section-wrapper">
			<h4>Members</h4>
			<?php
				$sql_1 = "SELECT * FROM members";
				$sql_2 = "SELECT baptized FROM members WHERE baptized= 'y'";
				$result_1 = $connect->query($sql_1);
				$result_2 = $connect->query($sql_2);
				$t_num= $result_1->num_rows;
				$b_num= $result_2->num_rows;
				$u_num= $t_num - $b_num;
				if ($t_num > 0) {
					echo "<p>The church has <b>$t_num</b> members to date, <b>$b_num</b> have been baptized and <b>$u_num</b> are yet to be baptized.</p>";

				}
		?>
		</div>
		<div class="section-wrapper">
			<h4>Prayer Requests</h4>
			<?php
				$sql_1 = "SELECT * FROM prayer_requests";
				$sql_2 = "SELECT * FROM prayer_requests WHERE status='Pending'";
				$sql_3 = "SELECT * FROM prayer_requests WHERE status='Done'";
				$result_1 = $connect->query($sql_1);
				$result_2 = $connect->query($sql_2);
				$result_3 = $connect->query($sql_3);
				$t_num= $result_1->num_rows;
				$pending_num= $result_2->num_rows;
				$done_num= $result_3->num_rows;
				if ($t_num > 0) {
					echo "<p>There have been <b>$t_num</b> prayer requests; <b>$pending_num</b> is/are pending and <b>$done_num</b> have been taken care of.</p>";

				}
			?>
		</div>
		<div class="section-wrapper">
			<h4>Announcements</h4>
			<?php
				$sql_1 = "SELECT * FROM announcement";
				$result_1 = $connect->query($sql_1);
				$t_num= $result_1->num_rows;
				if ($t_num > 0) {
					echo "<p>There have been <b>$t_num</b> announcements to date</p>";

				}
		?>
		</div>
		<div class="section-wrapper">
			<h4>Leaders</h4>
			<?php
				$sql_1 = "SELECT * FROM leaders";
				$result_1 = $connect->query($sql_1);
				$t_num= $result_1->num_rows;
				if ($t_num > 0) {
					echo "<p>The church has <b>$t_num</b> leaders to date</p>";

				}
		?>
		</div>
	</div>
</section>