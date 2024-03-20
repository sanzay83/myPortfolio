<?php            

$host = 'localhost';
$dbusername = 'sanzay83_san';
$dbpassword = '{9+AEWXZaWq.';
$dbname = 'sanzay83_ISA';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
$techID = mysqli_real_escape_string($conn, $_GET['techID']);
$fname = mysqli_real_escape_string($conn, $_GET['fname']);
$lname = mysqli_real_escape_string($conn, $_GET['lname']);
$date = mysqli_real_escape_string($conn, $_GET['date']);
$timein = mysqli_real_escape_string($conn, $_GET['timein']);
$timeout = mysqli_real_escape_string($conn, $_GET['timeout']);
$isacb = mysqli_real_escape_string($conn, $_GET['isarso']);

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error() .')'.mysqli_connect_error());
}
else{
    $sql = "INSERT INTO Timesheet(`TechID`, `FName`, `LName`, `Date`, `Time In`, `Time Out`, `ISA/RSO`) VALUES ('$techID','$fname','$lname','$date','$timein','$timeout','$isacb')";
    if ($conn->query($sql)){
        echo 'Timesheet has been recorded successfully',"<br>";
        echo "Name: ", $fname," ", $lname,"<br>", 
        "Date: ", $date,"<br>",
        "TimeIN: ", $timein,"<br>",
        "TimeOUT: ", $timeout,"<br>",
        "ISA/RSO: ", $isacb, "<br>";
    }
    else{
        echo "Error: ".$sql ."<br>". $conn->error;
    }
    $conn->close();
}
?>