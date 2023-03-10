<?php
session_start();
include('./db.php');
$email = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['sub'])) {
    $sql = "SELECT * FROM `users` Where Email='$email' AND Password='$password' ";
    $data = mysqli_query($conn, $sql);
    if (mysqli_num_rows($data) == 1) {

        $row = mysqli_fetch_assoc($data);
        $_SESSION['logedIn'] = 1;
        $_SESSION['id'] = $row['User_Id'];
        $Id = $row['User_Id'];
        header('location:home.php?currentId=' . $Id);
        exit();
    } else {
        unset($_SESSION['logedIn']);
        unset($_SESSION['id']);
        header('location: LoginForm.php');
        exit();
    }
}
