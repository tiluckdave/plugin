<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["place_order"])) {
    // Perform actions to save the order details to the database

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Save order details to the database
    $orderItems = implode(',', $_SESSION['cart']);
    $sql = "INSERT INTO orders (item_ids) VALUES ('$orderItems')";
    $conn->query($sql);

    // Clear the shopping cart
    $_SESSION['cart'] = array();

    // Close the database connection
    $conn->close();

    // Display confirmation to the user
    echo "<h2>Order Placed Successfully!</h2>";
    echo "<p>Thank you for your order. Your items will be prepared and delivered shortly.</p>";
}
?>
