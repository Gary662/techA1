<?php 
$conn = mysqli_connect("localhost", "root", "", "login2");

if($conn){
    // Connection successful message removed
}else{
    // Error handling message removed

    die("Connection failed" . mysqli_connect_error());
};
