<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
</head>

    <h2>Restaurant Menu</h2>

    <?php
    // Define the menu items
    $menuItems = [
        "Pizza" => 300,
        "Burger" => 150,
        "Pasta" => 250,
        "Salad" => 100,
        "Sushi" => 500,
        "Tacos" => 200
    ];
    ?>

    <form action="" method="post">
        <?php
        foreach ($menuItems as $item => $price) {
            echo '<div>';
            echo '<input type="checkbox" name="menu[]" value="' . $item . '"> ' . $item . ' => Rate: ₹' . $price;
            echo ' <input type="number" name="quantity[]" min="1" value="1" style="width: 50px;">'; // Quantity input
            echo '</div>';
        }
        ?>
        <button name="submit">Place Order</button>
    </form>
    
    <?php

    if (isset($_POST['submit'])) {
        $selectedItems = $_POST['menu'];
        $quantities = $_POST['quantity'];
        $totalPrice = 0;

        echo "<h3>You have selected:</h3>";
        echo "<ul>";

        foreach ($selectedItems as $index => $item) {
            $quantity = intval($quantities[$index]); // Get quantity for the selected item
            $itemPrice = $menuItems[$item] * $quantity;
            $totalPrice += $itemPrice;

            echo "<li>$item - ₹" . $menuItems[$item] . " x $quantity = ₹$itemPrice</li>";
        }
        echo "</ul>";
        echo "<p><strong>Total Price:</strong> ₹$totalPrice</p>";
    }

    ?>

</body>

</html>