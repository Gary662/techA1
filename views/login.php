<?php 
include "../partials/header.php";
include "../partials/navigation.php";

require_once '../db.php';
require_once '../models/User.php';
$userModel = new User($conn);

if ($userModel->isUserLoggedIn()) {
    $userModel->redirect("dashboard.php");
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            $userModel->redirect("dashboard.php");
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username";
    }
}
?>
<div class="container">
    <h2>Login</h2>
    <p style="color:red"><?php echo $error; ?></p>    
    <form method="POST">
        <div>
            <label for="email">Email:</label>
            <input id="email" placeholder="Enter your email" type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input id="password" placeholder="Enter your password" type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>

<?php
include "../partials/footer.php";
mysqli_close($conn);
?>
