<?php            

$host = 'localhost';
$dbusername = 'sanzay83_san';
$dbpassword = '{9+AEWXZaWq.';
$dbname = 'sanzay83_ISA';

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
$email = mysqli_real_escape_string($conn, $_GET['email']);

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error() .')'.mysqli_connect_error());
}
else{
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == true){
        $sql = "INSERT INTO `Subscribe` (`Email`) VALUES ('$email');";
        if ($conn->query($sql)){
            echo '<h1>Subscribe to ISA newsletter successful</h1>',"<br>";
        }
        else{
            echo "Error: ".$sql ."<br>". $conn->error;
        }
    }
    else{
        echo "Invalid Email!";
    }
    $conn->close();
}
?>