<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Adding quiz submission record to table" />
	<meta name="keywords" content="PHP, MySql" />
	<title>Sign Up</title>
	<link href="style/style.css" rel="stylesheet" />
</head>

<h1 id="header-title">Sign Up</h1>
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


		// $user_id = rand(1000000000, 9999999999);

		$create_query = "CREATE TABLE IF NOT EXISTS users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            user_name VARCHAR(20),
            password VARCHAR(10)
            )";

		if (mysqli_query($con, $create_query)) {

			$query = "INSERT INTO users (user_name, password) VALUES ('$user_name','$password')";

			if (mysqli_query($con, $query)) {
				header("Location: login.php");
			} else {
				echo "Sign up FAILED!";
				echo "mysqli_query($con, $query)";
			}


			die;
		} else {
			echo "Unable to establish connection to database!";
		}
	} else {
		echo "Please enter some valid information!";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
</head>

<body>

	<style type="text/css">
		#text {

			height: 8%;
			border-radius: 5px;
			padding: 0.8%;
			/* margin-left: 13%; */
			border: solid thin #aaa;
			width: 70%;
		}

		#button {

			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
			margin-left: 5%;
		}

		#box {

			background-color: grey;
			margin: auto;
			width: 35%;
			padding: 2%;
		}
	</style>


	<div id="box">

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Sign Up</div>
			<label id="text_name" for="user_name">Username</label>
			<input id="text" type="text" name="user_name"><br><br>
			<label class="text_name" for="password">Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>

</html>