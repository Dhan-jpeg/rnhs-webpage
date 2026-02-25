<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RNHS_Login</title>
    <link rel="stylesheet" href="login.css" />
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
            <?php if (!empty($_SESSION['login_error'])): ?>
                <p class="error"><?php echo htmlspecialchars($_SESSION['login_error']); unset($_SESSION['login_error']); ?></p>
            <?php endif; ?>
            <form class="login-form" action="login_process.php" method="POST">
                <label for="email">Your email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required />
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required />
                
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="remember" />
                    <label for="remember">Remember me</label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
                <div class="signup-text">Don't have an account? <a href="registry.php">Sign Up</a></div>
                
                <button type="submit" class="sign-in-btn">Login</button>
            </form>
            <p class="back-container">
                <a href="../main-page/home.php" class="back-home" aria-label="Back to homepage">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </p>
            <script>
                // warn user if they try to leave without logging in
                document.addEventListener('DOMContentLoaded', function() {
                    var links = document.querySelectorAll('.back-home');
                    links.forEach(function(link) {
                        link.addEventListener('click', function(e) {
                            // check session flag from PHP
                            <?php $logged = !empty($_SESSION['user_id']) ? 'true' : 'false'; ?>
                            if (<?= $logged ?> === false) {
                                e.preventDefault();
                                if (confirm('You are not logged in. Leaving the page will discard any progress. Continue?')) {
                                    window.location = this.href;
                                }
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>