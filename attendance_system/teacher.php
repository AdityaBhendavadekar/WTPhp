<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    $host = "localhost";
    $user ="root";
    $pass = "";
    $db = "sample";

    $conn = new mysqli($host, $user, $pass, $db);
    
    if($conn->connect_error){
        die('connection failed'.$conn->connect_error);
    }

    $sql = "SELECT rollno, st_name FROM student_att";
    $result = $conn->query($sql);

    $currentDay = date("l"); // e.g., Monday, Tuesday
    $currentDate = date("Y-m-d"); // Format: YYYY-MM-DD
    ?>

    <h2>Take Attendance</h2>
    <p>Today: <strong><?php echo $currentDay; ?></strong></p>
    <p>Date: <strong><?php echo $currentDate; ?></strong></p>

    <?php
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo '<div>';
                echo '<input type="checkbox" name="students[]" value="' .$row['rollno']. '"/>';
                echo '<label>' . $row['st_name'] . ' (Roll No: ' . $row['rollno'] . ')</label>';
                echo '</div>';
            }
        }else{
            echo "No students found";
        }

        $conn->close();
    ?>

    <button onclick="onSubmit()" >Submit Attendance</button>
    
    <script>
        function onSubmit(){
            var students = document.getElementsByName('students[]');
            var rollNos = [];
            for(var i=0; i<students.length; i++){
                if(students[i].checked){
                    rollNos.push(students[i].value);
                    }
                    }
                    var data = {
                        "rollNos": rollNos,
                        "date": "<?php echo $currentDate; ?>",
                        "day": "<?php echo $currentDay; ?>"
                        };
                    console.log(data);
        }

    </script>

</body>
</html>