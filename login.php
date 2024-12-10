<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];

    $conn = new mysqli('localhost', 'root', '', 'Lab_5b');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['matric'] = $matric;
        header("Location: display.php");
    } else {
        $loginError = "Login failed! Please try again.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="">
        Matric: <input type="text" name="matric" required><br>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($loginError)): ?>
        <p style="color: red;"><?= htmlspecialchars($loginError) ?></p>
    <?php endif; ?>
    <p>Don't have an account? <a href="registration.php">Register here</a>.</p>
</div>
</body>
</html>

