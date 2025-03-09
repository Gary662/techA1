<nav>
<?php if(is_user_logged_in()): ?>
<ul>
    <li><a href="dashboard.php" class="<?php echo setActiveCLass('dashboard.php'); ?>">Dashboard</a></li>
    <li><a href="create_student.php" class="<?php echo setActiveCLass('create_student.php'); ?>">Add Student</a></li>
    <li><a href="logout.php" class="<?php echo setActiveCLass('logout.php'); ?>">Logout</a></li>
</ul>
<?php else: ?>
<ul>
    <li><a href="index.php" class="<?php echo setActiveCLass('index.php'); ?>">Home</a></li>
    <li><a href="login.php" class="<?php echo setActiveCLass('login.php'); ?>">Login</a></li>
    <li><a href="register.php" class="<?php echo setActiveCLass('register.php'); ?>">Register</a></li>
</ul>
<?php endif; ?>


</nav>
