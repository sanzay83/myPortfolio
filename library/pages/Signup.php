<?php
   include("config.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      $fname = mysqli_real_escape_string($db,$_POST['fname']);
      $lname = mysqli_real_escape_string($db,$_POST['lname']);
      $email = mysqli_real_escape_string($db,$_POST['email']); 
      
      
      $sql = "INSERT INTO `Login`(`StarID`, `Password`) VALUES ('$username','$password')";
      if ($db->query($sql)){
          $sql = "INSERT INTO `Student_record`(`StarID`, `First Name`, `Last Name`, `email`) VALUES ('$username','$fname','$lname','$email')";
          if ($db->query($sql)){
              $subject = "Signup Successful";
              $from = "From:sanzay8342258@gmail.com";
              $body = "Welcome $fname $lname, \n You have successfully created an account on Library Room Booking website. \n You can now login with your username $username and password. \n Thank you";
              mail($email, $subject,$body,$from );
              header("Location: sus.html");
          }
          else{
              echo("Invalid! Something went wrong.");
          }
      }
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
            <li><a href="../index.html">home</a></li>
        </div>    
    </div>
    </menu>
    <div class="logincontainer">
        <form action="" method="post">
            <H1>Sign Up</H1>
            <label for="username"><b>Username</b></label><br>
            <input type="text" placeholder="Enter starID" name="username" required><br>
            <label for="password"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="password" required><br>
            <label for="fname"><b>First Name</b></label><br>
            <input type="text" placeholder="Enter First Name" name="fname" required><br>
            <label for="lname"><b>Last Name</b></label><br>
            <input type="text" placeholder="Enter Last Name" name="lname" required><br>
            <label for="email"><b>Email</b></label><br>
            <input type="email" placeholder="Enter email" name="email" required><br>
            <br>
            <button type="submit" value="Submit">Signup</button><br>
        </form>
    </div>
    <footer>
        <p>Minnesota State University, Mankato</p>
    </footer>
</body>
</html>