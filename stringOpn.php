<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>String Operations</h2>

    <form action="" method="post">

    <input type="text" name="input" id="input">
    <button type="upper" name="upper">Upper</button>
    <button type="lower" name="lower">Lower</button>
    <button type="fupper" name="fupper">First upper</button>
    <button type="allf" name="allf">All First upper</button>
    

    </form>
    
    <?php

    if(isset($_POST['upper'])){
        $name = $_POST['input'];
        $result = strtoupper($name);
        echo $result;
    }

    if(isset($_POST['lower'])){
        $name = $_POST['input'];
        $result = strtolower($name);
        echo $result;
    }

    if(isset($_POST['fupper'])){
        $name = $_POST['input'];
        $result = ucfirst(strtolower($name));
        echo $result;
    }

    if(isset($_POST['allf'])){
        $name = $_POST['input'];
        $result = ucwords($name);
        echo $result;
    }
    
    ?>
</body>
</html>