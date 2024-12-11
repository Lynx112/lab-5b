<?php
$conn = new mysqli('localhost', 'root', '', 'Lab_5b');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Matric</th><th>Name</th><th>Role</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["matric"] . "</td><td>" . $row["name"] . "</td><td>" . $row["role"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
