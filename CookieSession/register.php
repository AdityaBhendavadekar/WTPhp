<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        session_start();

        if(isset($_SESSION['loggedin'])){
            header("Location:home.php");
            exit();
        }

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "sample";

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn->connect_error){
        echo $conn->connect_error;
    }

    ?>

    <form action="" method="post">
        <input type="text" name="uname" placeholder="Enter your name">
        <input type="text" name="pass" placeholder="Enter your password">
        <button name="register">Register</button>
    </form>

    <?php

       if(isset($_POST['register'])){
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $query = "INSERT INTO student_att (st_name, pass, rollno) VALUES ('$uname', '$pass', '1234')";
        if($conn->query($query)){

            $_SESSION['studname'] = $uname;
            $_SESSION['loggedin'] = true;

            setcookie("studname", $uname, time() + 3600);
            setcookie("loggedin", true, time() + 3600);

            header("Location:home.php");
            exit();
        }

        
        echo "Data inserted successfully";
       }
    
    ?>
</body>


</html>