<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session</title>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo "<p>Welcome, {$_SESSION['username']}!</p>";
        echo '<p><a href="logout.php">Logout</a></p>';
    } else {
        echo '
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Login</button>
    </form>';
    }
    ?>

</body>

</html>