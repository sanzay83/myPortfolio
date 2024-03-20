<?php
   include('session.php');
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       $password = mysqli_real_escape_string($db,$_POST['password']);
       $fname = mysqli_real_escape_string($db,$_POST['fname']); 
       $lname = mysqli_real_escape_string($db,$_POST['lname']);
       $email = mysqli_real_escape_string($db,$_POST['email']);
       $sql = "UPDATE `Login` SET `Password`='$password' WHERE `StarID`='$user_check'";
       $db->query($sql);
       $sql = "UPDATE `Student_record` SET `First Name`='$fname',`Last Name`='$lname',`email`='$email' WHERE `StarID`='$user_check'";
       $db->query($sql);
   }
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
    <br>
    <div class="container">
        <?php
            $sql = "SELECT `StarID`, `First Name`, `Last Name`, `email` FROM `Student_record` WHERE StarID='$user_check'";
            $row = (($db->query($sql))->fetch_assoc());
            $fname = $row["First Name"];
            $lname = $row["Last Name"];
            $email = $row["email"];
            echo ("<b>Username:</b> $user_check <br><b>First Name:</b> $fname <br><b>Last Name:</b> $lname <br><b>Email:</b> $email");
        ?>
    </div>
    <a href="welcome.php" class="button_1">Go Back</a></center>
    <div class="container">
        <form action="" method="post">
            <H1>Update User Informations</H1>
            <label for="password"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="password" required><br>
            <label for="fname"><b>First Name</b></label><br>
            <input type="text" placeholder="Enter First Name" name="fname" required><br>
            <label for="lname"><b>Last Name</b></label><br>
            <input type="text" placeholder="Enter Last Name" name="lname" required><br>
            <label for="email"><b>Email</b></label><br>
            <input type="email" placeholder="Enter email" name="email" required><br>
            <br>
            <button type="submit" value="Submit">Update</button><br>
        </form>
    </div>
    
    <footer>
        <p>Minnesota State University, Mankato</p>
    </footer>
</body>
</html>