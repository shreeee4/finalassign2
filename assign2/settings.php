<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="PHP+SQL" />
    <meta name="keywords" content="PHP,SQL,Database" />
    <meta name=" author " content="Shreeya Shrestha" />
</head>

<body>
    <?php
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s103831863";
    $pwd = "210104";
    $sql_db = "s103831863_db";

    if (!$con = mysqli_connect($host, $user, $pwd, $sql_db)) {

        die("failed to connect!");
    }
    ?>
</body>

</html>