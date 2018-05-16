<?php
	session_start();
	require 'shared/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Love Church- Admin</title>
		<!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/admin_style.css">
	</head>
	<body style="background: #2c3e50">
		<section>
			<div class="container">
				<div id="form-wrapper" class="text-center">
					<h2>Administrator Login</h2><hr>
					<?php
						$msg= (isset($_GET['msg']))? $_GET['msg'] : 'msg is not set';
						switch($msg){
							case 1:
								echo "
									<div id='o_m' class='o_m_error'>
										<p><b>Error!!!</b></br>Fatal Error...<br>Please Contact System Administrator</p>
									</div>";
							break;
							case 2:
								echo "
									<div id='o_m' class='o_m_error'>
										<p><b>Error!!!</b></br>Incorrect Email or Password</p>
									</div>";
							break;
						}
					?>
					<form method="post" action="#">
						<div class='form-group'>
							<label for='email' class='sr-only'>Login Email: </label>
							<input type='email' class='form-control' id='login_email' placeholder='Login Email' name="login_email" required>
						</div>
						<div class='form-group'>
							<label for='pwd' class='sr-only'>Password: </label>
							<input type='password' class='form-control' id='pwd' placeholder='Password' name="pwd" required>
						</div>
						<button type="submit" class="btn btn-success" name="login" id="login">Login</button>
					</form>
				</div>
			</div>
		</section>			
	</body>
</html>

<?php
	if (isset($_POST['login'])){
		$email= mysqli_real_escape_string($connect, $_POST['login_email']);
		$pwd= mysqli_real_escape_string($connect, $_POST['pwd']);
		
		$sql= "SELECT * FROM admin WHERE admin_email='$email'";
		$result = $connect->query($sql);//query database
		if ($result->num_rows < 1){//If there are no such entries
			header("Location: ?msg=2");//Display error message
		}else{
			if ($row = $result->fetch_assoc()){
				//De-hashing password
				$pwdCheck = password_verify($pwd, $row['pwd']);
				if ($pwdCheck == FALSE){
					header("Location: ?msg=2");
				}elseif ($pwdCheck == TRUE){
					//Log admin in
					$_SESSION['admin'] = $row['admin_email'];
					header("Location: ../?l=home&&msg=logged in");
				}
			}else{
				header("Location: ?msg=1");
			}
		}
		//echo "<section style='background: white'>$email<br><br>$pwd<br><br>$ePwd</section>";
		//header("Location: ../?l=home");
	}
?>