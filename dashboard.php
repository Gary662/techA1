<?php
include "partials/header.php";
include "partials/navigation.php";

if(!is_user_logged_in()){
    redirect("login.php");
}
?>

<h1 style="text-align:center">Welcome, <?php echo $_SESSION['username']; ?>! This is your dashboard</h1>

<div style="text-align: center;">

<?php
    // Fetch all students from the database
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
?>

<table style="margin: 0 auto;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Student ID</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php while($student = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $student['id']; ?></td>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['student_id']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td>
            <a href="delete_student.php?id=<?php echo $student['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<a href="create_student.php">Add New Student</a>

<?php
    include "partials/footer.php";
?>
