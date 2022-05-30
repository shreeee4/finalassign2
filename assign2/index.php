<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Homepage</title>
</head>
<h1 id="header-title">Homepage</h1>
<?php
include_once("menu.inc");
?>

<body id="index-body">

    <h1 id="showcase">Hi, Mate!</h1>
    <div id="content" class="container">
        Ever thought how the smart light bulb is controlled by your mobile phone?<br>
        How could Alexa turn on the music player? Then you must take some time and start<br>
        browsing this site made by five students of Swinburne University of Technology.<br>
        <a href=https://youtu.be/hEFouC7IzL4>Click here</a> to take a look at our video!
    </div>
    <a href="topic.php" class="btn">Let's Learn More</a>
    <?php
    include_once("index-footer.inc");
    ?>
</body>

</html>