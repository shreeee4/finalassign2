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
    <h1 id="header-title">Quiz Submission Status</h1>
    <?php
    include_once("menu.inc");
    ?>
    <?php

    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
    } else {
        header("location: quiz.php");
    }

    if (isset($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
    }

    if (isset($_POST["studentnumber"])) {
        $studentnumber = $_POST["studentnumber"];
    }

    $score = 0;
    $errMsg = "";


    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
        if ($quantity == "") {
            $errMsg = "<p>Question 5 is unattempted. Please attempt all questions before submitting.</p>";
        } elseif ($quantity == 1883) {
            $score += 1;
        }
    }

    if (isset($_POST["sensortype"])) {
        $sensortype = $_POST["sensortype"];
        if ($sensortype == "") {
            $errMsg = "<p>Question 4 is unattempted. Please attempt all questions before submitting.</p>";
        } elseif ($sensortype == 'TwoTypes') {
            $score += 1;
        }
    }


    $components = array();


    if (!(isset($_POST['sensors']) or isset($_POST['connectivity']) or isset($_POST['security']) or isset($_POST['userinterface']))) {
        $errMsg = "<p>Question 3 is unattempted. Please attempt all questions before submitting.</p>";
    } elseif (isset($_POST['sensors'])) {
        $components[0] = isset($_POST['sensors']) ? 1 : 0;
        $components[1] = isset($_POST['connectivity']) ? 1 : 0;
        $components[2] = isset($_POST['security']) ? 1 : 0;
        $components[3] = isset($_POST['userinterface']) ? 1 : 0;

        if ($components[0] == 1 and $components[1] == 1 and $components[2] == 0 and $components[3] == 1) {
            $score += 1;
        }
    }

    if (!isset($_POST["answers"])) {
        $errMsg = "<p>Question 2 is unattempted. Please attempt all questions before submitting.</p>";
    } elseif (isset($_POST["answers"])) {
        $answers = $_POST["answers"];
        if ($answers == "Internet") {
            $score += 1;
        }
    }



    if (isset($_POST["youranswer"])) {
        $youranswer = $_POST["youranswer"];
        if ($youranswer == "") {
            $errMsg = "<p>Question 1 is unattempted. Please attempt all questions before submitting.</p>";
        } elseif (strpos($youranswer, 'IoT') !== false) {
            $score += 1;
        }
    }

    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $firstname = sanitise_input($firstname);
    $lastname = sanitise_input($lastname);
    $studentnumber = sanitise_input($studentnumber);
    $youranswer = sanitise_input($youranswer);


    if ($studentnumber == "") {
        $errMsg = "<p>You must enter your student number.</p>";
    } else if (!is_numeric($studentnumber)) {
        $errMsg = "<p>Student ID must a valid number.</p>";
    } else if ((strlen((string)$studentnumber) != 7) and (strlen((string)$studentnumber) != 10)) {
        $errMsg = "<p>Student ID must of valid length.</p>";
    }

    if ($lastname == "") {
        $errMsg = "<p>You must enter your last name.</p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
        $errMsg = "<p>Only alpha letters allowed in your last name.</p>";
    } else if (strlen($lastname) > 30) {
        $errMsg = "<p>Your last name can only be 30 characters long.</p>";
    }


    if ($firstname == "") {
        $errMsg = "<p>You must enter your first name.</p>";
    } else if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        $errMsg = "<p>Only alpha letters allowed in your first name.</p>";
    } else if (strlen($firstname) > 30) {
        $errMsg = "<p>Your first name can only be 30 characters long.</p>";
    }

    if ($errMsg != "") {
        echo "<p>$errMsg</p>";
        exit();
    } else

        include('settings.php');

    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {

        $student_query = "CREATE TABLE IF NOT EXISTS Student (
            snum INTEGER(10) PRIMARY KEY,
            fname VARCHAR(30),
            lname VARCHAR(30)
            )";

        $attempt_query = "CREATE TABLE IF NOT EXISTS Attempts (
            attempt_id INT AUTO_INCREMENT PRIMARY KEY,
            attempt_dt DATETIME,
            snum INTEGER(10), 
            nofattempt INTEGER(1),
            score INTEGER(2),
            FOREIGN KEY (snum) REFERENCES Student(snum)
            )";

        $student_result = mysqli_query($conn, $student_query);
        $attempt_result = mysqli_query($conn, $attempt_query);

        if (!$student_result) {
            echo "<p>Create table Student unsuccessful.</p>";
        } else if (!$attempt_result) {
            echo "<p>Create table Attempt unsuccessful.</p>";
        } else {

            $check_attempt_query = "SELECT * FROM Attempts WHERE snum = $studentnumber";
            $attempts_num_sql = mysqli_query($conn, $check_attempt_query);
            $attempts = intval(mysqli_num_rows($attempts_num_sql));

            if ($attempts >= 2) {
                echo "<p>Out of attempts</p>";
                exit();
            } else if ($score == 0) {
                echo "<p><a href='quiz.php'>Your score is 0. Please check your answers and resubmit</a></p></p>";
                exit();
            } else if ($attempts == 0) {
                $insert_student_query = "INSERT INTO Student (snum, fname, lname)
                    VALUES ('$studentnumber', '$firstname', '$lastname')";
                $insert_student_result = mysqli_query($conn, $insert_student_query);
            }

            if ($attempts >= 0) {

                $attempts += 1;

                $today = date("Y-m-d H:i:s");

                $insert_attempt_query = "INSERT INTO Attempts (attempt_dt, snum, nofattempt, score)
                    VALUES ('$today', '$studentnumber', $attempts, $score)";
                $insert_attempt_result = mysqli_query($conn, $insert_attempt_query);

                if ($insert_attempt_result) {
                    echo "<p>Following Answers submitted Successfully on $today !</p>";
                    echo "<p>First name: $firstname</p>";
                    echo "<p>Last name: $lastname</p>";
                    echo "<p>Student number: $studentnumber</p>";
                    echo "<p>Attempt No: $attempts</p>";

                    if ($attempts == 1) {
                        echo "<p><a href='quiz.php'>Click here to take the quiz again.</a></p>";
                    }

                    echo "<p>Score: $score</p>";
                } else {
                    echo "<p>Submission Unsuccessful</p>";
                }
            }
        }
        mysqli_Close($conn);
    }
    ?>

</body>

</html>