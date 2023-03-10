<?php
session_start();
include('./db.php');
$sql = "UPDATE `users` SET `Status`='Offline' where `User_Id`='{$_SESSION['id']}'";
mysqli_query($conn, $sql);
if (isset($_SESSION['id'])) {
    session_unset();
    header('location: LoginForm.php');
    exit();
}
