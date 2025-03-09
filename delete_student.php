<?php
include "partials/header.php";
include "partials/navigation.php";

if(!is_user_logged_in()){
    redirect("login.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Delete the student from the database
    $sql = "DELETE FROM students WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        redirect("dashboard.php");
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
} else {
    echo "No student ID provided.";
}

include "partials/footer.php";
mysqli_close($conn);
?>
