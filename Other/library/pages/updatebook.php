<?php
   include('session.php');
   include("config.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       $date = mysqli_real_escape_string($db,$_POST['date']);
       $time = mysqli_real_escape_string($db,$_POST['time']); 
       $room = mysqli_real_escape_string($db,$_POST['room']);
       $sql = "UPDATE `Reserved` SET `Date`='$date',`Time`='$time',`Room`='$room' WHERE `StarID`='$user_check'";
        if($db->query($sql)){
            echo("<center><h1><b>You have successfully updated your Booking.</b></h1><br><a href='welcome.php' class='button_1'>Go Back</a></center>");
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker({minDate: 0, maxDate: 6});
    } );
    </script>
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
            $sql = "SELECT `StarID`, `Date`, `Time`, `Room` FROM `Reserved` WHERE StarID='$user_check'";
            $result = $db->query($sql);
            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $date = $row["Date"];
                $time = $row["Time"];
                $room = $row["Room"];
                echo ("<font18>You have a booking on $date at $time and Room no $room</font18><br>");
            }
        ?>
    </div>
    <a href="welcome.php" class="button_1">Go Back</a></center>
    <div class="container">
        <form action="" method="post">
            <label>Choose Date, Time & Room to Update Booking</label><br><br>
            <label>Select Date</label><br>
            <input type="text" placeholder="Select Date" name="date" id="datepicker" required><br>
            <label>Select Time</label><br>
            <select name="time" required>
                <option value="8:00:00">8am</option>
                <option value="10:00:00">10am</option>
                <option value="12:00:00">12pm</option>
                <option value="14:00:00">2pm</option>
                <option value="16:00:00">4pm</option>
                <option value="18:00:00">6pm</option>
                <option value="20:00:00">8pm</option>
                <option value="20:00:00">10pm</option>
            </select><br>
            <label>Select Room</label><br>
            <select name="room" required>
                <option value="1001">1001</option>
                <option value="1002">1002</option>
                <option value="1003">1003</option>
                <option value="1004">1004</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="3001">3001</option>
                <option value="3002">3002</option>
                <option value="3003">3003</option>
                <option value="3004">3004</option>
            </select><br>
            
            <button type="submit" value="Submit">Update</button>
        </form>
    </div>
    
    <footer>
        <p>Minnesota State University, Mankato</p>
    </footer>
</body>
</html>