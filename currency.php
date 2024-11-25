<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Currency Converter</h2>

    <form action="" method="post">
    
        <input type="text" name="dollar">
        <button name="convert">Convert</button>
        <p></p>
    </form>
        
    <?php

    if(isset($_POST['convert'])){
        $doll = intval($_POST['dollar']);
        echo $doll."$=". $doll*74 ."rs" ;
    }
    
    ?>

</body>
</html>