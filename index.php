<?php
session_start();

// Check if the form is submitted
if(isset($_POST['login'])) {
    $username = "jaafar";
    $password = "jaafar123";

    // Retrieve entered username and password from the form
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Check if the entered username and password match the hardcoded values
    if($entered_username === $username && $entered_password === $password) {
        $_SESSION['logged_in'] = true;
        header("Location: homepage.php");
        exit();
    } else {
        // If incorrect, display error message (optional)
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if(isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
