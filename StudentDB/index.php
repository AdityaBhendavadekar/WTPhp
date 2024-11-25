<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$hostname = "localhost";
$username = "root";
$pass = "";
$dbname = "sample";

$conn = new mysqli($hostname, $username, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<body>
    <form action="" method="post">
        <h2>Add New Student</h2>
        <label for="add_name">Name:</label>
        <input type="text" name="add_name" id="add_name" >

        <label for="add_marks">Marks:</label>
        <input type="text" name="add_marks" id="add_marks" >
        <button type="submit" name="save">Save</button>

        <h2>Delete Student by ID</h2>
        <label for="delete_id">ID:</label>
        <input type="text" name="delete_id" id="delete_id" >
        <button type="submit" name="delete">Delete</button>

        <button type="submit" name="fetch">Fetch</button>
    </form>

    <?php
    // Add New Student
    if (isset($_POST['save'])) {
        $name = $_POST['add_name'];
        $marks = $_POST['add_marks'];

        $query = $conn->query("INSERT INTO student (name, marks) VALUES ('$name', '$marks')");
    }

    // Delete Student by ID
    if (isset($_POST['delete'])) {
        $id = $_POST['delete_id'];

        $query = $conn->query("DELETE FROM student WHERE id = $id");
    }

    // Fetch Records
    if (isset($_POST['fetch'])) {
        $query2 = "SELECT * FROM student";
        $records = $conn->query($query2);

        if ($records) {
            if ($records->num_rows > 0) {
                while ($row = $records->fetch_assoc()) {
                    echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Marks: " . $row['marks'] . "<br>";
                }
            } else {
                echo "No records found.<br>";
            }
        } else {
            echo "Error fetching data: " . $conn->error . "<br>";
        }
    }
    ?>
</body>

</html>