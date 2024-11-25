<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed" . $conn->connect_error);
}
?>

<form action="" method="post" >
    <input type="text" name="uname" id="uname">
    <input type="text" name="roll" id="pass">
    <input type="text" name="pass" id="pass">
    <button name="register"> Register</button>
</form>

<?php

if(isset($_POST['register'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $roll = $_POST['roll'];


    $query = "INSERT INTO student_att (st_name, rollno, pass) values ('$uname', '$roll' , '$pass')";

    $response = $conn->query($query);

    if($response){
        echo "data inserted";
    }else{
        echo "data not inserted";
    }
}

?>

</body>
</html>