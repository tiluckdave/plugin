<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformation</title>
</head>
<body>

<h2>String Transformation</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="inputString">Enter a String:</label>
    <input type="text" id="inputString" name="inputString" required>
    
    <label>Choose Transformation:</label>
    <select name="transformation">
        <option value="uppercase">Uppercase</option>
        <option value="lowercase">Lowercase</option>
        <option value="capitalize">Capitalize Words</option>
    </select>

    <button type="submit" name="transform">Transform</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transform"])) {
    $inputString = $_POST["inputString"];
    $transformation = $_POST["transformation"];

    switch ($transformation) {
        case 'uppercase':
            $result = strtoupper($inputString);
            break;
        case 'lowercase':
            $result = strtolower($inputString);
            break;
        case 'capitalize':
            $result = ucwords(strtolower($inputString));
            break;
        default:
            $result = "Invalid transformation";
            break;
    }

    echo "<p>Original String: $inputString</p>";
    echo "<p>Transformed String: $result</p>";
}
?>

</body>
</html>
