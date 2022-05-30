<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Adding quiz submission record to table" />
    <meta name="keywords" content="PHP, MySql" />
    <title>Quiz Records</title>
    <link href="style/style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;1,300;1,700&display=swap" rel="stylesheet">
</head>



<body>
    <h1 id="header-title">Manage Quiz Records</h1>
    <?php
    include_once("menu.inc");

    if (isset($_POST['studentnumber']) and (isset($_POST['attemptnumber'])) and (isset($_POST['newscore']))) {
        $snum = $_POST["studentnumber"];
        $attemptnumber = $_POST["attemptnumber"];
        $newscore = $_POST["newscore"];
    } else {
        header("location: manage.php");
        exit();
    }

    include('settings.php');

    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    if ($conn) {
        $query = "UPDATE Attempts SET score = $newscore WHERE snum = $snum AND nofattempt = $attemptnumber";
        $result = mysqli_query($conn, $query);

        if ($query) {
            echo "<p>UPDATE SUCCESSFUL!</p>";
            echo "<p><a href='manage.php'>Back to Manage Page.</a></p>";
        } else {
            echo "<p>UPDATE UNSUCCESSFUL!</p>";
            echo "<p><a href='manage.php'>Back to Manage Page.</a></p>";
            mysqli_close($conn);
        }
    } else {
        echo "<p>CONNECTION FAILED!</p>";
    }
    ?>