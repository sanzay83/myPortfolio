<?php
   include('session.php');
   include("config.php");
   
?>

<!doctype html>

<html lang="en">
<head>
	<title>Room book</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <header>
        <div class="container">
                <img src="../images/logo.jpg">
            <text>Minnesota State University </text><sub>Mankato</sub>
            </div>
    </header>
    <menu>
        <div class="container">
            <div class="left">
                <?php
                $sql = "SELECT `StarID`, `First Name`, `Last Name`, `email` FROM `Student_record` WHERE StarID='$user_check'";
                $row = (($db->query($sql))->fetch_assoc());
                $fname = $row["First Name"];
                $lname = $row["Last Name"];
                echo ("<loginfont>Hi, $fname $lname</loginfont>");
                ?>
            </div>
            <div class="right"> 
                <li><a href="logout.php">Logout</a></li> </div>
            </div>
    </menu>
    <div class="container">
        <?php
            $sql = "DELETE FROM `Reserved` WHERE `StarID`='$user_check'";
            if($db->query($sql)){
                echo("<center><h1><b>You have successfully deleted your Booking.</b></h1>");
            }
        ?>
        <a href="welcome.php" class="button_1">Go Back</a></center>
    </div>
    
    <footer>
        <p>Minnesota State University, Mankato</p>
    </footer>
</body>
</html>