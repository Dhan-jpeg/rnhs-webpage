<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RNHS_SignUp</title>
    <link rel="stylesheet" href="registry.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php session_start(); ?>
    <div class="container">
        <div class="left-panel">
            <div class="logo">
                <img src="logo2.jpeg">
                <h1>Rosales National High School</h1>
                <p>Senior High School</p>
            </div>
        </div>
        <div class="right-panel">
            <?php if (!empty($_SESSION['reg_error'])): ?>
                <p class="error"><?php echo htmlspecialchars($_SESSION['reg_error']); unset($_SESSION['reg_error']); ?></p>
            <?php endif; ?>
            <form class="login-form" action="registry_process.php" method="POST">
                <label for="email">Your email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required />
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required />
                
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required />
                
                <div class="signup-text">Already have an account? <a href="login.php">Login</a></div>
                
                <button type="submit" class="sign-in-btn">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>