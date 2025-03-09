<?php
include "partials/header.php";
include "partials/navigation.php";

if(!is_user_logged_in()){
    redirect("login.php");
}

$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $student_id = $_POST["student_id"];
    $email = $_POST["email"];

    // Insert new student into the database
    $sql = "INSERT INTO students (name, student_id, email) VALUES ('$name', '$student_id', '$email')";
    if(mysqli_query($conn, $sql)){
        redirect("dashboard.php");
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<div class="container" style="text-align: center;">

    <h2 style="margin-bottom: 20px;">Add New Student</h2>

    <p style="color:red"><?php echo $error; ?></p>
    <form method="POST">
        <div>
            <label for="name">Name:</label>
            <input id="name" placeholder="Enter student name" type="text" name="name" required>
        </div>
        <div>
            <label for="student_id">Student ID:</label>
            <input id="student_id" placeholder="Enter student ID" type="text" name="student_id" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input id="email" placeholder="Enter student email" type="email" name="email" required>
        </div>
        <button type="submit">Add Student</button>
    </form>
</div>

<?php
include "partials/footer.php";
mysqli_close($conn);
?>
