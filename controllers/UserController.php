<?php
require_once '../config/db.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User($this->conn);
    }

    public function registerUser($username, $password) {
        // Logic for registering a user
    }

    public function loginUser($username, $password) {
        // Logic for logging in a user
    }

    public function logoutUser() {
        // Logic for logging out a user
    }
}
?>
