<?php

session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // look up the user by email
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // authentication successful
            $_SESSION['user_id'] = $user['id'];
            header("Location: user.php");
            exit();
        } else {
            // invalid password, redirect back with an error
            $_SESSION['login_error'] = 'Invalid password.';
        }
    } else {
        // no such user
        $_SESSION['login_error'] = 'No user found with that email.';
    }

    header("Location: login.php");
    exit();
}
?>