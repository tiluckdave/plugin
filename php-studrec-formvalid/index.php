<?php
include("db.php");

// Create student record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $name = $_POST["name"];
    $grade = $_POST["grade"];

    $sql = "INSERT INTO students (name, grade) VALUES ('$name', $grade)";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success">Record added successfully</div>';
    } else {
        echo '<div class="error">Error: ' . $sql . '<br>' . $conn->error . '</div>';
    }
}

// Delete student record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success">Record deleted successfully</div>';
    } else {
        echo '<div class="error">Error deleting record: ' . $conn->error . '</div>';
    }
}

// Fetch and display student records
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<h2>Student Records</h2>

<form name="studentForm" onsubmit="return validateForm()" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="grade">Grade:</label>
    <input type="text" id="grade" name="grade" required>

    <button type="submit" name="add">Add Record</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Grade</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["name"]}</td>
                    <td>{$row["grade"]}</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='id' value='{$row["id"]}'>
                            <button type='submit' name='delete'>Delete</button>
                        </form>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
