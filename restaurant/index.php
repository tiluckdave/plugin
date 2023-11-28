<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch menu items
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

// Initialize cart
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle add to cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    $itemId = $_POST["item_id"];
    if (!in_array($itemId, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $itemId;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Food Order</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Restaurant Menu</h1>

    <div class="menu">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="item">
                    <h2><?php echo $row["name"]; ?></h2>
                    <p><?php echo $row["description"]; ?></p>
                    <p class="price">$<?php echo number_format($row["price"], 2); ?></p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="item_id" value="<?php echo $row["id"]; ?>">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
                <?php
            }
        } else {
            echo "No items in the menu.";
        }
        ?>
    </div>

    <div class="cart">
        <h2>Shopping Cart</h2>
        <ul>
            <?php
            foreach ($_SESSION['cart'] as $itemId) {
                $sql = "SELECT * FROM menu WHERE id = $itemId";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <li><?php echo $row["name"]; ?> - $<?php echo number_format($row["price"], 2); ?></li>
                <?php
            }

            
// Close the database connection
$conn->close();
            ?>
        </ul>
        <form method="post" action="place_order.php">
            <button type="submit" name="place_order">Place Order</button>
        </form>
    </div>
</div>

</body>
</html>
