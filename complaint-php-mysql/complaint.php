<?php
session_start();
include("db.php");

if (!isset($_SESSION["username"])) {
    header("Location: student-login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitComplaint"])) {
    $username = $_SESSION["username"];
    $complaint = $_POST["complaint"];

    $sql = "INSERT INTO complaints (username, complaint) VALUES ('$username', '$complaint')";
    $conn->query($sql);

    $successMessage = "Complaint submitted successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Complaint</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Student Complaint</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="complaint">Enter your complaint:</label>
    <textarea id="complaint" name="complaint" rows="4" required></textarea>

    <button type="submit" name="submitComplaint">Submit Complaint</button>

    <?php
    if (isset($successMessage)) {
        echo "<p class='success'>$successMessage</p>";
    }
    ?>
</form>

</body>
</html>
