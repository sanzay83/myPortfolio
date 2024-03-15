<?php            
    include("config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $array_room = array("1001","1002","1003","1004","2001","2002","2003","2004","3001","3002","3003","3004");
        $date = mysqli_real_escape_string($db,$_POST['date']);
        $time = mysqli_real_escape_string($db,$_POST['time']); 
        
        $sql = "SELECT `Date`, `Time`, `Room` FROM `Reserved` WHERE `Date`='$date' AND `Time`='$time' ";
        $result = $db->query($sql);
        
        $array_fill = array();
        
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($array_fill, $row["Room"]);
            }
        }
        
    }
?>
<!doctype html>
<head>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <br>
    <li><a href="process.html" class="button_1">Go Back</a></li>
    <?php
    echo "<center><h2>Room Availability for Date $date and Time $time</h2></center>";
    ?>
    <table class="tabledesign">
        <tr>
            <th><b>Room No.</b></th>
            <th><b>Available</b></th>
        </tr>
    <?php
        foreach($array_room as $aroom){
            if (in_array($aroom, $array_fill)){
                echo ("<tr><th>$aroom</th><th>NO</th></tr>");
            }
            else{
                echo ("<tr><th>$aroom</th><th>YES</th></tr>");
            }
        }
    ?>
    
</body>
</html>