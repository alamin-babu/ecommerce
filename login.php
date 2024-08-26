<?php
session_start();
$usersFile = 'users.json';

$redirectUrl = isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : 'index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Load existing users
    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    // Check if user exists and password is correct
    if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
        $_SESSION['username'] = $username;
        header("Location: " . $redirectUrl); 
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<?php include "./head.php"?>
<br>
<h1 style="text-align: center;">Login</h1>
<div class="login-form">
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
    <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <a href="register.php">Don't have an account? Register here</a>
</div>