<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Check if the cookie 'studname' exists
    if (isset($_COOKIE['studname'])) {
        $username = htmlspecialchars($_COOKIE['studname']); // Get the cookie value and sanitize it
        echo "<h2>Hello, $username</h2>"; // Display the username
    } else {
        echo "<h2>Hello, user</h2>"; // Default greeting if no cookie is found
    }
    ?>
</body>
</html>
