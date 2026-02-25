<?php

session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>You are logged in as user ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>