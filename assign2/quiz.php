<!DOCTYPE html>
<html lang="en" id="background-pallete">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Form">
    <meta name="keywords" content="forms, input">
    <meta name="author" content="">
    <title>Quiz</title>
    <link href="style/style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;1,300;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <h1 id="header-title">Quiz Page</h1>
    <?php
    include_once("menu.inc");
    ?>
    <form action="markquiz.php" method="post">
        <fieldset class="secondary-pallete" id="top-field">
            <legend class="content-title">Student details</legend>
            <p>
                <label class="content-text" for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname">
                <label class="content-text" for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname">
            </p>
            <p>
                <label class="content-text" for="studentnumber">Student Number</label>
                <input type="text" name="studentnumber" id="studentnumber">
            </p>
        </fieldset>
        <fieldset class="secondary-pallete">
            <legend class="content-title">What does the term "Internet of Things"(IoT) mean?</legend>
            <p>
                <label class="content-text" for="youranswer">Your Answer</label>
                <input type="text" name="youranswer" id="youranswer" value="" maxlength="200">
            </p>
        </fieldset>
        <fieldset class="secondary-pallete">
            <legend class="content-title">Which of the following describes how an IoT device is linked to data?
            </legend>
            <p>
                <input type="radio" name="answers" id="Internet" value="Internet" />
                <label class="content-text" for="Internet">Internet</label>
                <input type="radio" name="answers" id="cloud" value="Cloud" />
                <label class="content-text" for="cloud">Cloud</label>
                <input type="radio" name="answers" id="automata" value="Automata" />
                <label class="content-text" for="automata">Automata</label>
                <input type="radio" name="answers" id="data" value="Data" />
                <label class="content-text" for="data">Data</label>
            </p>
        </fieldset>
        <fieldset class="secondary-pallete">
            <legend class="content-title">An IoT device typically comprises of four major components. Which three components below
                are considered as major?</legend>
            <p>
                <input type="checkbox" id="sensors" name="sensors" value="sensors">
                <label class="content-text" for="sensors">Sensors</label>
                <input type="checkbox" name="connectivity" id="connectivity" value="connectivity" />
                <label class="content-text" for="connectivity">Connectivity</label>
                <input type="checkbox" name="security" id="security" value="security" />
                <label class="content-text" for="security">Security</label>
                <input type="checkbox" name="userinterface" id="userinterface" value="userinterface" />
                <label class="content-text" for="userinterface">User Interface</label>
            </p>
        </fieldset>
        <fieldset class="secondary-pallete">
            <legend class="content-title">In the Internet of Things, how many different types of capacitive touch
                sensors exist?</legend>
            <p>
                <select name="sensortype" id="sensortype">
                    <option value="">Please Select</option>
                    <option value="TwoTypes">Two Types</option>
                    <option value="FiveTypes">Five types</option>
                    <option value="SevenTypes">Seven Types</option>
                    <option value="NineTypes">Nine Types</option>
                </select>
            </p>
        </fieldset>
        <fieldset class="secondary-pallete">
            <legend class="content-title">What is the secure MQTT protocol's standard port number?</legend>
            <p>
                <label class="content-text" for="quantity">Port Number:</label>
                <input type="number" id="quantity" name="quantity">
            </p>
        </fieldset>
        <input type="submit" value="Submit" class="main-buttons">
        <input type="reset" value="Reset Quiz" class="main-buttons">
    </form>
    <?php
    include_once("footer.inc");
    ?>
</body>

</html>