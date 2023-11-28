<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="currency-converter">
    <h1>Currency Converter</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="dollars">Enter Dollars:</label>
        <input type="text" id="dollars" name="dollars" required>
        <button type="submit" name="convert">Convert</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["convert"])) {
        $dollars = $_POST["dollars"];
        $exchangeRate = 75; // Replace with the actual exchange rate
        $rupees = $dollars * $exchangeRate;
        ?>

        <div class="result">
            <p>Converted Rupees: <?php echo number_format($rupees, 2); ?></p>
        </div>

    <?php } ?>
</div>

</body>
</html>
