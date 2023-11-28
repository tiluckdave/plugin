<?php
session_start();
include("db.php");

if (!isset($_SESSION["admin"])) {
    header("Location: admin-login.php");
    exit();
}

$sql = "SELECT * FROM complaints";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Complaints List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Complaint</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["username"]}</td>
                    <td>{$row["complaint"]}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No complaints found</td></tr>";
    }
    ?>
</table>

</body>
</html>