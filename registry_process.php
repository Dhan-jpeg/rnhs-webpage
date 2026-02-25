<?php

session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    // basic validation
    if (empty($email) || empty($password) || empty($confirm)) {
        $_SESSION['reg_error'] = 'All fields are required.';
    } elseif ($password !== $confirm) {
        $_SESSION['reg_error'] = 'Passwords do not match.';
    } else {
        // check if email already exists
        $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $_SESSION['reg_error'] = 'This email is already registered.';
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $insert->bind_param("ss", $email, $hashed);

            if ($insert->execute()) {
                $_SESSION['user_id'] = $insert->insert_id;
                header("Location: user.php");
                exit();
            } else {
                $_SESSION['reg_error'] = 'Unable to create account. Please try again later.';
            }
        }
    }

    header("Location: registry.php");
    exit();
}

// if not a POST request, send user to signup form
header("Location: registry.php");
exit();
