<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Adding quiz submission record to table" />
	<meta name="keywords" content="PHP, MySql" />
	<title>Supervisor Login</title>
	<link href="style/style.css" rel="stylesheet" />
</head>

<body>
	<h1 id="header-title">Login</h1>
	<?php
	include_once("menu.inc");
	?>

	<?php

	session_start();

	include("settings.php");
	include("functions.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {


			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if ($result) {
				if ($result && mysqli_num_rows($result) > 0) {

					$user_data = mysqli_fetch_assoc($result);

					if ($user_data['password'] === $password) {

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: manage.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		} else {
			echo "wrong username or password!";
		}
	}

	?>
	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
			<label id="text_name" for="user_name">Username</label>
			<input id="text" type="text" name="user_name"><br><br>
			<label class="text_name" for="password">Password</label>
			<input id="text" type="password" name="password"><br><br>


			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>

</html>