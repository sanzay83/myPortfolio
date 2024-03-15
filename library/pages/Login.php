<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT StarID FROM Login WHERE StarID = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	    
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
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
            <H1>LOGIN</H1>
            <img src="../images/loginimg.jpg" class="picdesign"><br>
            <label for="username"><b>Username</b></label><br>
            <input type="text" placeholder="Enter starID" name="username" required><br>
            <label for="password"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="password" required><br><br>
            <button type="submit" value="Submit">Login</button><br>
            <label><input type="checkbox" checked="checked" name="checkbox" id="ckbox"> Remember Me</label><br>
            <a href="Signup.php">Need Account? Signup</a>
        </form>
    </div>
    <footer>
        <p>Minnesota State University, Mankato</p>
    </footer>
</body>
</html>