<?php
include "../partials/header.php";
include "../partials/navigation.php";

require_once '../db.php';
require_once '../models/User.php';
$userModel = new User($conn);

if (!$userModel->isUserLoggedIn()) {
    $userModel->redirect("login.php");
}

$error = "";
$successMessage = ""; // Variable to hold success message
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $student_id = $_POST["student_id"];
    $email = $_POST["email"];

    // Insert new student into the database
    $sql = "INSERT INTO students (name, student_id, email) VALUES ('$name', '$student_id', '$email')";
    if (mysqli_query($conn, $sql)) {
        $successMessage = "Student added successfully!"; // Set success message
        header("Location: create_student.php?success=1"); // Redirect with success parameter
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

// Query to retrieve all students
$students_sql = "SELECT * FROM students";
$students_result = mysqli_query($conn, $students_sql);
?>

<div class="container" style="text-align: center;">
    <h2 style="margin-bottom: 20px;">Add New Student</h2>
    <p style="color:red"><?php echo $error; ?></p>
    <?php if (isset($_GET['success'])): ?>
        <p style="color:green">Student added successfully!</p>
    <?php endif; ?>

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

    <h2 style="margin-top: 40px;">Students List</h2>
    <table border="1" style="width: 100%; margin-top: 20px;">
        <tr>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
        </tr>
        <?php
        if (mysqli_num_rows($students_result) > 0) {
            while ($row = mysqli_fetch_assoc($students_result)) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['student_id']}</td>
                        <td>{$row['email']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No students found.</td></tr>";
        }
        ?>
    </table>
</div>

<?php
include "../partials/footer.php";
mysqli_close($conn);
?>
