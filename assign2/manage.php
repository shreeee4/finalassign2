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
    ?>
    <?php
    if (!isset($_POST["studentnumber"]) and !isset($_POST["score"]) and !isset($_POST["attemptnum"]) and !isset($_POST["scorerange"])) {
        $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
        FROM Student S
        INNER JOIN Attempts A 
        WHERE A.snum = S.snum";
    } else {
        $snum = trim($_POST["studentnumber"]);
        $scorenum = trim($_POST["score"]);
        $attemptnum = trim($_POST["attemptnum"]);
        $scorerange = trim($_POST["scorerange"]);

        if ($snum != "" and $scorenum != "") {
            $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score like '$scorenum'";
        } else if ($snum != "" and $attemptnum != "") {
            $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.nofattempt like '$attemptnum'";
        } else if ($scorenum != "" and $attemptnum != "") {
            $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score like '$scorenum' AND A.nofattempt like '$attemptnum'";
        } elseif ($snum != "" and $scorerange != "") {
            if ($scorerange == '>1') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score >1";
            } elseif ($scorerange == '>2') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score >2";
            } elseif ($scorerange == '>3') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score >3";
            } elseif ($scorerange == '>4') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score >4";
            } elseif ($scorerange == '<2') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score <2";
            } elseif ($scorerange == '<3') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score <3";
            } elseif ($scorerange == '<4') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score <4";
            } elseif ($scorerange == '<5') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND S.snum like '$snum%' AND A.score <5";
            }
        } elseif ($attemptnum != "" and $scorerange != "") {
            if ($scorerange == '>1') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score >1";
            } elseif ($scorerange == '>2') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score >2";
            } elseif ($scorerange == '>3') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score >3";
            } elseif ($scorerange == '>4') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score >4";
            } elseif ($scorerange == '<2') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score <2";
            } elseif ($scorerange == '<3') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score <3";
            } elseif ($scorerange == '<4') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score <4";
            } elseif ($scorerange == '<5') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.nofattempt like '$attemptnum' AND A.score <5";
            }
        } else if ($snum != "") {
            $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
        FROM Student S
        INNER JOIN Attempts A 
        WHERE A.snum = S.snum
        AND S.snum like '$snum%'";
        } else if ($scorenum != "") {
            $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
        FROM Student S
        INNER JOIN Attempts A 
        WHERE A.snum = S.snum
        AND A.score like '$scorenum'";
        } else if ($attemptnum != "") {
            $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
        FROM Student S
        INNER JOIN Attempts A 
        WHERE A.snum = S.snum
        AND A.nofattempt like '$attemptnum'";
        } else if ($scorerange != "") {
            if ($scorerange == '>1') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score >1";
            } elseif ($scorerange == '>2') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score >2";
            } elseif ($scorerange == '>3') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score >3";
            } elseif ($scorerange == '>4') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score >4";
            } elseif ($scorerange == '<2') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND AND A.score <2";
            } elseif ($scorerange == '<3') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score <3";
            } elseif ($scorerange == '<4') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score <4";
            } elseif ($scorerange == '<5') {
                $query = "SELECT A.attempt_id, S.snum, S.fname, S.lname, A.attempt_dt, A.nofattempt, A.score 
            FROM Student S
            INNER JOIN Attempts A 
            WHERE A.snum = S.snum
            AND A.score <5";
            }
        }
    }

    include('settings.php');

    if ($con) {

        $result = mysqli_query($con, $query);

        if ($result) {
            $list_all = mysqli_fetch_assoc($result);
            if ($list_all) {
                echo "<table border = '1'>";
                echo "<tr><th>Attempt ID</th>
                    <th>Student Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Attempt Date-Time</th>
                    <th>Attempt Number</th>
                    <th>Score</th></tr>";

                while ($list_all) {
                    echo "<tr><td>{$list_all['attempt_id']}</td>";
                    echo "<td>{$list_all['snum']}</td>";
                    echo "<td>{$list_all['fname']}</td>";
                    echo "<td>{$list_all['lname']}</td>";
                    echo "<td>{$list_all['attempt_dt']}</td>";
                    echo "<td>{$list_all['nofattempt']}</td>";
                    echo "<td>{$list_all['score']}</td></tr>";
                    $list_all = mysqli_fetch_assoc(($result));
                }
                echo "</table>";
                mysqli_free_result($result);
            } else
                echo "<p>No Record Available.</p>";
            echo "<p><a href='manage.php'>Click here to view Main List.</a></p>";
        } else {
            echo "<p>SELECT QUERY UNSUCCESSFUL!</p>";
        }
        mysqli_close($con);
    } else {
        echo "<p>Connection Failed! </p>";
    }
    ?>
    <h2>Search Records</h2>
    <form action="manage.php" method="post">

        <p><label>Student ID: <input type="text" name="studentnumber" /></label></p>
        <p><label>Score: <input type="text" name="score" /></label></p>
        <p> OR</p>
        <p>
            <legend>Score by range:</legend>
            <select name="scorerange" id="scorerange">
                <option value="">Please Select</option>
                <option value=">1">Greater than 1</option>
                <option value=">2">Greater than 2</option>
                <option value=">3">Greater than 3</option>
                <option value=">4">Greater than 4</option>
                <option value="<2">Less than 2</option>
                <option value="<3">Less than 3</option>
                <option value="<4">Less than 4</option>
                <option value="<5">Less than 5</option>
            </select>
            <legend>Attempt Number:</legend>
            <select name="attemptnum" id="attemptnum">
                <option value="">Please Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <input type="submit" value="Search" />
        </p>
    </form>

    <h2>Delete Records</h2>
    <form action="delete.php" method="post">
        <p><label>Student ID: <input type="text" name="studentnumber" /></label></p>
        <input type="submit" value="Delete" />
        </p>
    </form>

    <h2>Update Records</h2>
    <form action="update.php" method="post">
        <p><label>Student ID: <input type="text" name="studentnumber" /></label></p>
        <p><label>Attempt Number: <input type="number" name="attemptnumber" /></label></p>
        <p><label>Updated Score: <input type="text" name="newscore" /></label></p>
        <input type="submit" value="Update" />
        </p>
    </form>
</body>
<?php
include_once("footer.inc");
?>

</html>